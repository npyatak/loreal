<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property string $description
 * @property int $show_on_main
 * @property int $test
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['show_on_main', 'test'], 'integer'],
            [['title', 'image', 'url_1', 'url_2', 'url_3'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'image' => 'Изображение',
            'url_1' => 'Ссылка 1',
            'url_2' => 'Ссылка 2',
            'url_3' => 'Ссылка 3',
            'description' => 'Описание',
            'show_on_main' => 'Показать на главной',
            'test' => 'Задание',
        ];
    }

    public function getImageUrl() {
        return Yii::$app->urlManagerFrontEnd->createAbsoluteUrl($this->image);
    }
}
