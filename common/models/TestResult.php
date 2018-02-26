<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test_result".
 *
 * @property int $id
 * @property int $range_start
 * @property int $range_end
 * @property string $title
 */
class TestResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['range_start', 'range_end', 'title'], 'required'],
            [['range_start', 'range_end'], 'integer'],
            [['title'], 'safe'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'range_start' => 'От',
            'range_end' => 'До',
            'title' => 'Заголовок',
            'image' => 'Изображение',
        ];
    }

    public function getImageUrl() {
        return Yii::$app->urlManagerFrontEnd->createAbsoluteUrl($this->image);
    }
}
