<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "share".
 *
 * @property int $id
 * @property string $uri
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string $twitter
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'share';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['uri', 'required'],
            [['uri', 'title', 'text', 'image', 'twitter'], 'string', 'max' => 255],
            ['uri', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uri' => 'Адрес',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'image' => 'Изображение',
            'twitter' => 'Текст для твиттера',
        ];
    }
    
    public function getImageSrcPath() {
        return __DIR__ . '/../../frontend/web';
    }
}
