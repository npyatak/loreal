<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\web\UploadedFile;
use frontend\widgets\cropimage\helpers\Image;
use yii\web\NotFoundHttpException;

use common\models\User;
use common\models\Question;
use common\models\TestResult;
use common\models\Product;
use common\models\Video;
use common\models\Share;
use common\models\Post;
use common\models\PostAction;
use common\models\Week;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $currentWeek;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'eauth' => [
                // required to disable csrf validation on OpenID requests
                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                'only' => ['login'],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'participate', 'user-action'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'participate', 'user-action'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ], 
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function init() {
        $this->currentWeek = Week::getCurrent();
    }

    public function beforeAction($action) {
        if(Yii::$app->controller->action->id == 'candidate') {
            return parent::beforeAction($action);
        }

        $share = Share::find()->where(['uri' => $_SERVER['REQUEST_URI']])->asArray()->one();
        if($share === null) {
            $share = Yii::$app->params['defaultShare'];
        }

        $view = $this->getView();
        $view->params['share'] = $share;

        return parent::beforeAction($action);
    }

    public function actionIndex($res = 1)
    {
        $postsLimit = 8;
        
        if (Yii::$app->request->isAjax && isset($_GET['res'])) {
            $uri = Url::to(['site/index', 'res' => $_GET['res']]);
            $share = Share::find()->where(['uri' => $uri])->asArray()->one();
            $share['uri'] = Url::to($uri, $_SERVER['REQUEST_SCHEME']);
            $share['image'] = $share['image'] ? Url::to($share['image'], $_SERVER['REQUEST_SCHEME']) : '';
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $share;
        }

        $products = Product::find()->joinWith('productLinks')->where(['show_on_main' => 1])->all();

        $results = [];
        $questions = [];
        $scores = [];
        $comments = [];

        foreach (Question::find()->with('answers')->all() as $key => $q) {
            $key++;
            $variants = [];
            foreach ($q->answers as $a) {
                $variants[] = $a->title;
                $scores[$key][] = $a->score;
                $comments[$key][] = ['comment' => $a->comment, 'comment_title' => $a->comment_title];
            }
            $questions[$key] = [
                'number' => $key,
                'vopros' => $q->title,
                'image' => $q->image,
                'variant' => $variants,
            ];
        }

        foreach (TestResult::find()->all() as $r) {
            $results[$r->id] = [
                'min' => $r->range_start,
                'max' => $r->range_end,
                'title' => $r->title,
                'description' => $r->description,
                'image' => $r->image,
                'image_2' => $r->image_2,
                'id' => $r->id,
            ];
        }

        return $this->render('index', [
            'products' => $products,
            'results' => $results,
            'questions' => $questions,
            'scores' => $scores,
            'comments' => $comments,
            'res' => $res,
            'video' => Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->one(),
            'posts' => Post::find()->where(['status' => Post::STATUS_ACTIVE])->limit($postsLimit)->all(),
        ]);
    }

    public function actionVideos()
    {
        $videosTop = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->all();
        $videosBottom = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 2])->all();

        return $this->render('videos', [
            'videosTop' => $videosTop,
            'videosBottom' => $videosBottom,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionParticipate() {
        $model = new Post();

        if(!Yii::$app->user->isGuest && $model->load(Yii::$app->request->post())) {
            $model->is_from_ig = 0;
            $model->user_id = Yii::$app->user->id;
            $model->week_id = $this->currentWeek->id;

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            $model->image = md5('front'.time()).'.'.$model->imageFile->extension;

            if($model->save()) {
                $path = $model->imageSrcPath;
                if(!file_exists($path)) {
                    mkdir($path, 0775, true);
                }
                $model->imageFile->saveAs($path.$model->image);
                
                Image::cropImageSection($path.$model->image, $path.$model->image, [
                    'width' => $model->front_w,
                    'height' => $model->front_h,
                    'y' => $model->front_y,
                    'x' => $model->front_x,
                    'scale' => $model->front_scale,
                    'degrees' => $model->front_angle,
                ]);

                return $this->redirect(['participate']);
            }
        } 
        
        return $this->render('participate', [
            'currentWeek' => $this->currentWeek,
            'weeks' => Week::find()->all(),
            'model' => $model,
        ]);
    }

    public function actionLogin() {
        $serviceName = Yii::$app->getRequest()->getQueryParam('service');
        $ref = Yii::$app->getRequest()->getQueryParam('ref');
        
        if (isset($serviceName)) {
            $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);

            if($ref !== '' && $ref != '/login') {
                $eauth->setRedirectUrl(Url::toRoute($ref));
            } else {
                $eauth->setRedirectUrl(Url::toRoute('site/vote'));
            }
            $eauth->setCancelUrl(Url::toRoute('site/login'));

            try {
                if ($eauth->authenticate()) {
                    $user = User::findByService($serviceName, $eauth->id);
                    if(!$user) {
                        $user = new User;
                        $user->soc = $serviceName;
                        $user->sid = $eauth->id;
                        $user->name = $eauth->first_name;
                        $user->surname = $eauth->last_name;
                        if(isset($eauth->photo_url)) $user->image = $eauth->photo_url;
                        if(isset($eauth->ig_id)) $user->ig_id = $eauth->ig_id;
                        if(isset($eauth->ig_username)) $user->ig_username = $eauth->ig_username;
                        
                        $user->save();
                    } elseif($user->status === User::STATUS_BANNED) {
                        Yii::$app->getSession()->setFlash('error', 'Вы не можете войти. Ваш аккаунт заблокирован');
                        
                        $eauth->redirect($eauth->getCancelUrl());
                    } elseif(!$user->name) {
                        $user->name = $eauth->first_name;
                        $user->surname = $eauth->last_name;
                        if(isset($eauth->photo_url)) $user->image = $eauth->photo_url;
                        if(isset($eauth->ig_id)) $user->ig_id = $eauth->ig_id;
                        if(isset($eauth->ig_username)) $user->ig_username = $eauth->ig_username;

                        $user->save();
                    }

                    $user->ip = $_SERVER['REMOTE_ADDR'];
                    $user->browser = $_SERVER['HTTP_USER_AGENT'];
                    $user->save(false, ['ip', 'browser']);

                    Yii::$app->user->login($user);
                    // special redirect with closing popup window
                    $eauth->redirect();
                } else {
                    // close popup window and redirect to cancelUrl
                    $eauth->cancel();
                    $eauth->redirect($eauth->getCancelUrl());
                }
            } catch (\nodge\eauth\ErrorException $e) {
                Yii::$app->getSession()->setFlash('error', 'EAuthException: '.$e->getMessage());

                $eauth->cancel();
                $eauth->redirect($eauth->getCancelUrl());
            }
        }

        return $this->render('login');
    }

    public function actionVote() {
        $limit = 8;
        $count = Post::find()->where(['week_id' => $this->currentWeek->id, 'status' => Post::STATUS_ACTIVE])->count();

        $query = Post::find()
            ->where(['week_id' => $this->currentWeek->id, 'status' => Post::STATUS_ACTIVE])
            ->limit($limit)
            ->orderBy(new \yii\db\Expression('rand()'));

        if (Yii::$app->request->isAjax && isset($_GET['ids'])) {
            $posts = $query->andWhere(['not in', 'id', $_GET['ids']])->all();

            return $this->renderPartial('_posts', [
                'posts' => $posts,
                'noMorePosts' => $count + count($_GET['ids']) >= $limit ? false : true,
            ]);
        }

        $posts = $query->all();
        $noMorePosts = $count >= $limit ? false : true;

        return $this->render('vote', [
            'posts' => $posts,
            'noMorePosts' => $noMorePosts,
        ]);
    }


    public function actionUserAction($id, $type=null) {        
        if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            switch ($type) {
                case 'vk':
                    $type = PostAction::TYPE_SHARE_VK;
                    break;
                case 'fb':
                    $type = PostAction::TYPE_SHARE_FB;
                    break;                
                default:
                    $type = PostAction::TYPE_LIKE;
                    break;
            }
            $post = $this->findPost($id);
            if($post !== null && $post->userCan($type)) {
                PostAction::create($id, $type);

                $newScore = Post::find()->select('score')->where(['id' => $id])->column();
                return ['status' => 'success', 'score' => $newScore];
            } else {
                return ['status' => 'error'];
            }
        }
    }

    public function actionPost($id) {
        $userPost = $this->findPost($id);

        $posts = Post::find()->where(['week_id' => $this->currentWeek->id, 'status' => Post::STATUS_ACTIVE])->limit(12)->orderBy(new \yii\db\Expression('rand()'))->all();

        return $this->render('post', [
            'userPost' => $userPost,
            'posts' => $posts,
        ]);
    }

    public function actionIndexNew($res = 1)
    {
        if (Yii::$app->request->isAjax && isset($_GET['res'])) {
            $uri = Url::to(['site/index', 'res' => $_GET['res']]);
            $share = Share::find()->where(['uri' => $uri])->asArray()->one();
            $share['uri'] = Url::to($uri, $_SERVER['REQUEST_SCHEME']);
            $share['image'] = $share['image'] ? Url::to($share['image'], $_SERVER['REQUEST_SCHEME']) : '';
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $share;
        }

        $products = Product::find()->joinWith('productLinks')->where(['show_on_main' => 1])->all();

        $results = [];
        $questions = [];
        $scores = [];
        $comments = [];

        foreach (Question::find()->with('answers')->all() as $key => $q) {
            $key++;
            $variants = [];
            foreach ($q->answers as $a) {
                $variants[] = $a->title;
                $scores[$key][] = $a->score;
                $comments[$key][] = ['comment' => $a->comment, 'comment_title' => $a->comment_title];
            }
            $questions[$key] = [
                'number' => $key,
                'vopros' => $q->title,
                'image' => $q->image,
                'variant' => $variants,
            ];
        }

        foreach (TestResult::find()->all() as $r) {
            $results[$r->id] = [
                'min' => $r->range_start,
                'max' => $r->range_end,
                'title' => $r->title,
                'description' => $r->description,
                'image' => $r->image,
                'image_2' => $r->image_2,
                'id' => $r->id,
            ];
        }

        return $this->render('index-new', [
            'products' => $products,
            'results' => $results,
            'questions' => $questions,
            'scores' => $scores,
            'comments' => $comments,
            'res' => $res,
            'video' => Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->one(),
            'posts' => Post::find()->where(['status' => Post::STATUS_ACTIVE])->all(),
        ]);
    }

    public function actionVideoNew()
    {
        $videosTop = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->all();
        $videosBottom = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 2])->all();

        return $this->render('video-new', [
            'videosTop' => $videosTop,
            'videosBottom' => $videosBottom,
        ]);
    }

    public function actionRules() {
        return $this->render('rules', [
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionVkParse($hashtag = 'axebest') {
        if(Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute(['profile/index']));
        }
        
        $user = Yii::$app->user->identity;

        $url = 'https://api.vk.com/method/video.search';
        $params = [
            'q' => $hashtag,
            'extended' => 1,
            //'count' => 3,
            //'params[start_from]' => '6%2F-65395224_8404',
            'fields' => 'profiles',
            'v' => 5.69,
            'access_token' => $user->access_token,
            'redirect_uri' => 'https://oauth.vk.com/blank.html',
            // 'filters' => 'youtube',
            // 'sort' => 0,
        ];

        $postParams = [];
        foreach ($params as $key => $value) {
            $postParams[] = $key.'='.$value; 
        }
        $url = $url.'?'.implode('&', $postParams);

        $res = file_get_contents($url);
        $res = json_decode($res);

        if(isset($res->response)) {
            $names = [];
            $addedCount = 0;
            if($res->response->profiles) {
                foreach ($res->response->profiles as $profile) {
                    $names[$profile->id] = $profile->first_name.' '.$profile->last_name;
                }
            }
            if($res->response->groups) {
                foreach ($res->response->groups as $group) {
                    $names[$group->id] = $group->name;
                }
            }

            if($res->response->items) {
                foreach ($res->response->items as $item) {
                    $challenge = new Challenge;

                    if(isset($item->platform) && $item->platform == 'YouTube') {
                        $challenge->link = $item->player;
                    } else {
                        $challenge->link = 'https://vk.com/video'.$item->owner_id.'_'.$item->id;
                    }
                    // $exp = explode('?', $item->player);
                    // $exp = explode('/', $exp[0]);
                    // $challenge->access_key = end($exp);

                    $sizes = ['photo_800', 'photo_640', 'photo_320', 'photo_160'];
                    foreach ($sizes as $size) {
                        if(isset($item->$size)) {
                            $challenge->image = $item->$size;
                            break;
                        }
                    }
                    
                    if($item->owner_id && isset($names[$item->owner_id])) {
                        $challenge->name = $names[$item->owner_id];
                    }
                    
                    //$challenge->soc = Challenge::SOC_YOUTUBE;

                    if($challenge->save()) {
                        $addedCount++;
                    }
                }
            }

            echo 'Найдено видео: '.count($res->response->items).' Добавлено новых: '.$addedCount;
        } else {
            echo 'Что-то пошло не так. Ответ сервера: ';
            print_r($res);
        }
    }
}
