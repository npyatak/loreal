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
use common\models\ProductGallery;
use common\models\Video;
use common\models\Share;
use common\models\Post;
use common\models\PostAction;
use common\models\Week;
use frontend\models\ContactForm;
use common\models\search\PostSearch;

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
        if (Yii::$app->request->isAjax && isset($_GET['res'])) {
            $uri = Url::to(['site/index', 'res' => $_GET['res']]);
            $share = Share::find()->where(['uri' => $uri])->asArray()->one();
            $share['uri'] = Url::to($uri, $_SERVER['REQUEST_SCHEME']);
            $share['image'] = $share['image'] ? Url::to($share['image'], $_SERVER['REQUEST_SCHEME']) : '';
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $share;
        }

        $sort = Yii::$app->getRequest()->getQueryParam('sort', '-created_at');

        $searchModel = new PostSearch();
        $params = Yii::$app->request->queryParams;
        $params['PostSearch']['status'] = Post::STATUS_ACTIVE;
        $params['PostSearch']['week_id'] = $this->currentWeek->id;

        $dataProvider = $searchModel->search($params);
        $dataProvider->sort = [
            'defaultOrder' => ['score'=>SORT_DESC],
            //'defaultOrder' => ['created_at'=>SORT_DESC],
            'attributes' => ['created_at', 'score'],
        ];
        $dataProvider->pagination = [
            'pageSize' => 8,
        ];

        $products = Product::find()
            ->joinWith('productGalleries')
            ->joinWith('productLinks')
            ->where(['show_on_main' => 1])
            ->andWhere(['product_gallery.gallery' => ProductGallery::INDEX])
            ->all();

        $results = [];
        $questions = [];
        $scores = [];
        $comments = [];

        $query = Question::find()
            ->with('answers')
            ->where(['status' => Question::STATUS_ACTIVE])
            ->orderBy(new \yii\db\Expression('rand()'));

        $qestionsType1 = $query->where(['type' => Question::TYPE_COMMON])->limit(4)->all();
        $qestionsType2 = $query->where(['type' => Question::TYPE_LOREAL])->limit(1)->all();
        $questionsArr = array_merge($qestionsType1, $qestionsType2);
        shuffle($questionsArr);

        foreach ($questionsArr as $key => $q) {
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
            //'video' => Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->one(),       
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sort' => $sort,
            'week' => $this->currentWeek,
        ]);
    }

    public function actionVideos($type = 2)
    {
        if(!in_array($type, [1, 2])) {            
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $videosBottom = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->all();
        //print_r($videosBottom);exit;

        $productsTop = Product::find()
            ->joinWith('productGalleries')
            ->joinWith('productLinks')
            ->where(['show_on_main' => 1])
            ->andWhere(['product_gallery.gallery' => ProductGallery::VIDEO_1])
            ->all();

        $productsBottom = Product::find()
            ->joinWith('productGalleries')
            ->joinWith('productLinks')
            ->where(['show_on_main' => 1])
            ->andWhere(['product_gallery.gallery' => ProductGallery::VIDEO_2])
            ->all();

        return $this->render('videos', [
            'productsTop' => $productsTop,
            'productsBottom' => $productsBottom,
            'type' => $type,
            'videosBottom' => $videosBottom,
            'week' => $this->currentWeek,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо за ваше сообщение. Мы свяжемся с вами в ближайшее время');
            } else {
                Yii::$app->session->setFlash('error', 'При отправке сообщения произошла ошибка.');
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
        $model->type = 1;

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
                    'width' => $model->w,
                    'height' => $model->h,
                    'y' => $model->y,
                    'x' => $model->x,
                    'scale' => $model->scale,
                    'degrees' => $model->angle,
                ]);

                Yii::$app->getSession()->setFlash('success', 'Твоя работа отправлена на модерацию');

                return $this->redirect(['participate']);
            }
        } 
        
        return $this->render('participate', [
            'week' => $this->currentWeek,
            'weeks' => Week::find()->all(),
            'model' => $model,
            'user' => Yii::$app->user->identity,
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
                $eauth->setRedirectUrl(Url::toRoute('site/participate'));
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
                    $user->save(false);

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

    public function actionRules() {
        return $this->render('rules');
    }  

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTestMail() {
        return Yii::$app->mailer->compose()
            ->setTo('hellofatso@mail.ru')
            ->setFrom(['hellofatso@mail.ru' => 'das'])
            ->setSubject('test')
            ->setTextBody('test')
            ->send();
    }

    private function findPost($id) {
        $post = Post::findOne($id);

        if($post === null || $post->status === Post::STATUS_BANNED) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $post;
    }
}