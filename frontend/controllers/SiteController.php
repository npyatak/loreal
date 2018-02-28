<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Question;
use common\models\TestResult;
use common\models\Product;
use common\models\Video;
use common\models\Share;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
        ];
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
        ]);
    }

    public function actionVideo()
    {
        $videosTop = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 1])->all();
        $videosBottom = Video::find()->where(['status' => Video::STATUS_ACTIVE, 'gallery' => 2])->all();

        return $this->render('video', [
            'videosTop' => $videosTop,
            'videosBottom' => $videosBottom,
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
