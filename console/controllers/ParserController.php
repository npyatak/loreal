<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\imagine\Image;

use backend\models\IgParseData;
use common\models\User;
use common\models\Week;
use common\models\Post;

class ParserController extends Controller {

    public function actionIg($hashtag = 'lorealhair') {
        $baseUrl = "https://www.instagram.com/explore/tags/$hashtag/?__a=1";
        $url = $baseUrl;
        $igParseDataIds = IgParseData::find()->select('ig_post_id')->asArray()->column();
        //print_r($igParseDataIds);exit;
        //print_r(htmlentities('#sd'));
        //exit;
        $totalCount = 0;
        $count = 0;

        while(1) {
            $page = 1;
            $json = json_decode(file_get_contents($url));
            // echo '<pre>';
            // echo '</pre>';
            // echo '<br>';
            // echo 'page = '.$page;
            $page++;
            foreach ($json->graphql->hashtag->edge_hashtag_to_media->edges as $edge) {
                $node = $edge->node;
                $totalCount++;
                if(!in_array($node->id, $igParseDataIds)) {
                    $parseData = new IgParseData;
                    $parseData->ig_post_id = $node->id;
                    $parseData->ig_user_id = $node->owner->id;
                    //$parseData->ig_caption = htmlentities($node->caption);
                    $parseData->image = $node->display_url;
                    $parseData->status = IgParseData::STATUS_PENDING;

                    $parseData->save();
                    $count++;
                }
            }
            if(!$json->graphql->hashtag->edge_hashtag_to_media->page_info->has_next_page) break;
            $url = $baseUrl.'&max_id='.$json->graphql->hashtag->edge_hashtag_to_media->page_info->end_cursor;
        }

        if($count != 0) {
            Yii::info('Data. '.$hashtag.': new rows added - '.$count.'. Total rows - '.$totalCount, 'parser');
        } else {
            Yii::info('Data. '.$hashtag.': no new data. Total rows - '.$totalCount, 'parser');
        }
    }

    public function actionIgImages($limit = 10) {
        $parseData = IgParseData::find()->where(['status' => IgParseData::STATUS_PENDING])->limit($limit)->all();
        $userIgIds = User::find()->select('ig_id')->asArray()->column();

        $newUsersCount = 0;
        $imagesCount = 0;

        foreach ($parseData as $data) {
            if(!in_array($data->ig_user_id, $userIgIds)) {
                $user = new User;
                $user->ig_id = $data->ig_user_id;

                $user->save();
                $newUsersCount++;
            } else {
                $user = User::find()->where(['ig_id' => $data->ig_user_id])->one();
            }

            $currentWeek = Week::getCurrent();

            $post = new Post();
            $post->scenario = 'parse';
            $post->user_id = $user->id;
            $post->is_from_ig = 1;
            $post->ig_parse_data_id = $data->id;
            $post->week_id = $currentWeek->id;

            if($post->save()) {
                $this->saveImage($post, $data->image);

                $data->status = IgParseData::STATUS_PROCESSED;
                $data->save(false);

                $imagesCount++;
            }
        }

        Yii::info('Image. '.count($parseData).' processed. '.$imagesCount.' images saved. '.$newUsersCount.' new users added.', 'parser');
    }

    public function actionVk($hashtag = 'lorealhair', $time = 1800) {
        $url = 'https://api.vk.com/method/photos.search';
        $start_time = time() - $time;

        $params = [
            'q' => $hashtag,
            'extended' => 1,
            //'count' => 3,
            //'params[start_from]' => '6%2F-65395224_8404',
            'start_time' => $start_time,
            'fields' => 'profiles%20',
            'v' => 5.69,
            'access_token' => 'af918e5daf918e5daf918e5d25aff1911caaf91af918e5df5a2130d3e85b32a77eea3d4',
        ];

        $postParams = [];
        foreach ($params as $key => $value) {
            $postParams[] = $key.'='.$value; 
        }
        $url = $url.'?'.implode('&', $postParams);

        $res = file_get_contents($url);

        $res = json_decode($res);
        $items = $res->response->items;
        $newUsersCount = 0;
        $imagesCount = 0;

        if(count($items) > 0) {
            $userVkIds = User::find()->select('sid')->where(['soc' => 'vk'])->asArray()->column();
            $currentWeek = Week::getCurrent();
            foreach ($items as $key => $item) {
                if($item->owner_id > 0) {
                    if(!in_array($item->owner_id, $userVkIds)) {
                        $user = new User;
                        $user->sid = $item->owner_id;
                        $user->soc = 'vk';

                        $user->save();
                        $newUsersCount++;
                    } else {
                        $user = User::find()->where(['sid' => $item->owner_id, 'soc' => 'vk'])->one();
                    }

                    $post = new Post();
                    $post->scenario = 'parse';
                    $post->user_id = $user->id;
                    $post->week_id = $currentWeek->id;
                    if($post->save()) {
                        $sizes = ['photo_2560', 'photo_1280', 'photo_807', 'photo_604'];
                        foreach ($sizes as $size) {
                            if(isset($item->$size)) {
                                $image = $item->$size;
                                break;
                            }
                        }
                        $this->saveImage($post, $image);
                        $imagesCount++;
                    }
                }
            }
        }
    
        Yii::info('VK parse '.$hashtag.'. Added photos: '.$imagesCount, 'parser');
    }

    public function actionVkPost($hashtag = 'lorealhair', $time = 1800) {
        $url = 'https://api.vk.com/method/newsfeed.search';
        $start_time = time() - $time;

        $params = [
            'q' => $hashtag,
            'extended' => 1,
            //'count' => 3,
            //'params[start_from]' => '6%2F-65395224_8404',
            'start_time' => $start_time,
            'fields' => 'profiles%20',
            'count' => 2,
            'v' => 5.69,
            'access_token' => 'af918e5daf918e5daf918e5d25aff1911caaf91af918e5df5a2130d3e85b32a77eea3d4',
        ];

        $postParams = [];
        foreach ($params as $key => $value) {
            $postParams[] = $key.'='.$value; 
        }
        $url = $url.'?'.implode('&', $postParams);

        $res = file_get_contents($url);

        $res = json_decode($res);
        $items = $res->response->items;
        $newUsersCount = 0;
        $imagesCount = 0;

        if(count($items) > 0) {
            //$userVkIds = User::find()->select('sid')->where(['soc' => 'vk'])->asArray()->column();
            $currentWeek = Week::getCurrent();
            foreach ($items as $key => $item) {
                if($item->attachments && $item->owner_id > 0) {
                    foreach ($item->attachments as $attachment) {
                        if($attachment->type == 'photo') {
                            $user = User::find()->where(['sid' => $item->owner_id, 'soc' => 'vk'])->one();
                            if($user === null) {
                                $user = new User;
                                $user->sid = $item->owner_id;
                                $user->soc = 'vk';

                                $user->save();
                                $newUsersCount++;
                            } 

                            $post = new Post();
                            $post->scenario = 'parse';
                            $post->user_id = $user->id;
                            $post->week_id = $currentWeek->id;
                            if($post->save()) {
                                $sizes = ['photo_2560', 'photo_1280', 'photo_807', 'photo_604', 'photo_130'];
                                foreach ($sizes as $size) {
                                    if(isset($attachment->photo->$size)) {
                                        $this->saveImage($post, $attachment->photo->$size);
                                        $imagesCount++;
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    
        Yii::info('VK parse '.$hashtag.'. Added photos: '.$imagesCount, 'parser');
    }

    private function saveImage($post, $image) {
        $path = $post->imageSrcPath;
        if(!file_exists($path)) {
            mkdir($path, 0775, true);
        }
        
        $post->image = md5('ig'.time()).'.jpg';
        $fileName = $path.$post->image;

        $ch = curl_init($image);
        $fp = fopen($fileName, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        
        $fileWidth = getimagesize($fileName)[0];
        $fileHeight = getimagesize($fileName)[1];

        $newWidth = Yii::$app->params['postImageSize']['width'];
        $newHeight = Yii::$app->params['postImageSize']['height'];

        // if($fileWidth > $fileHeight) {
        //     $newWidth = $newWidth * 2;
        //     $post->image_orientation = Post::IMAGE_HORIZONTAL;
        // } elseif($fileWidth == $fileHeight) {
        //     $post->image_orientation = Post::IMAGE_SQUARE;
        // } else {
        //     $newHeight = $newHeight * 2;
        //     $post->image_orientation = Post::IMAGE_VERTICAL;
        // }
        
        $post->image_orientation = Post::IMAGE_SQUARE;

        Image::thumbnail($fileName, $newWidth, $newHeight)->save($fileName);

        $post->save(false, ['image', 'image_orientation']);
    }
}