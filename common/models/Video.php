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
            [['key', 'image', 'title', 'text'], 'string', 'max' => 255],
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
            'image' => 'Превью',
            'title' => 'Заголовок',
            'text' => 'Текст',
        ];
    }

    public function getStatusArray() {
        return [
            self::STATUS_ACTIVE => 'Активно',
            self::STATUS_INACTIVE => 'Не активно',
        ];
    }

    public function getImageUrl() {
        return $this->image ? $this->image : 'https://img.youtube.com/vi/'.$this->key.'/maxresdefault.jpg';
    }

    public function getGalleryArray() {
        return [
            1 => 'Страница с видео. Низ.',
            2 => 'Страница с видео. Верх.',
            3 => 'Главная страница.',
        ];
    }
}
