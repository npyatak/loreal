<?php

namespace common\models;

use Yii;

class Video extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'gallery'], 'integer'],
            [['key'], 'required'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'key' => 'Id YouTube',
            'gallery' => 'Галерея',
        ];
    }

    public function getStatusArray() {
        return [
            self::STATUS_ACTIVE => 'Активно',
            self::STATUS_INACTIVE => 'Не активно',
        ];
    }

    public function getImage() {
        //return 'https://img.youtube.com/vi/'.$this->key.'/hqdefault.jpg';
        return 'https://img.youtube.com/vi/'.$this->key.'/maxresdefault.jpg';
    }

    public function getGalleryArray() {
        return [
            1 => 'Страница с видео. Низ.',
            2 => 'Страница с видео. Верх.',
        ];
    }
}
