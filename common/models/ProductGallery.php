<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_gallery".
 *
 * @property int $id
 * @property int $product_id
 * @property int $gallery
 *
 * @property Product $product
 */
class ProductGallery extends \yii\db\ActiveRecord
{
    const INDEX = 1;
    const VIDEO_1 = 2;
    const VIDEO_2 = 3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'gallery'], 'required'],
            [['product_id', 'gallery'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['product_id', 'gallery'], 'unique', 'targetAttribute' => ['product_id', 'gallery']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'gallery' => 'Gallery',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public static function getGalleryArray() {
        return [
            1 => 'Главная',
            2 => 'Видео 1',
            3 => 'Видео 2',
        ];
    }
}
