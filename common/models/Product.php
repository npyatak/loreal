<?php

namespace common\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{
    public $productLinksArray;
    public $galleryArray;
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
            [['title', 'image', 'ga_param'], 'string', 'max' => 255],
            ['galleryArray', 'safe'],
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
            'description' => 'Описание',
            'show_on_main' => 'Показать на главной',
            'test' => 'Задание',
            'ga_param' => 'GA параметр',
            'galleryArray' => 'Галереи',
        ];
    }

    public function afterSave($insert, $changedAttributes) {
        $linkIds = [];
        $oldIds = ProductLink::find()->select('id')->where(['product_id' => $this->id])->column();
        foreach ($this->productLinksArray as $link) {
            if($link->id) {
                $linkIds[] = $link->id;
            }
            $link->product_id = $this->id;
            $link->save();
        }

        foreach (array_diff($oldIds, $linkIds) as $idToDel) {
            ProductLink::findOne($idToDel)->delete();
        }

        ProductGallery::deleteAll(['product_id' => $this->id]);
        if(!empty($this->galleryArray)) {
            foreach ($this->galleryArray as $key => $gallery_id) {
                echo $gallery_id;
                $productGallery = new ProductGallery;
                $productGallery->product_id = $this->id;
                $productGallery->gallery = $gallery_id;

                $productGallery->save();
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function loadProductLinks($newModels) {
        foreach ($newModels as $model) {
            if(isset($model['id']) && $model['id']) {
                $link = ProductLink::findOne($model['id']);
            } else {
                $link = new ProductLink;
            }
            $link->load($model);
            $link->attributes = $model;
            $this->productLinksArray[] = $link;
        }

        return $this->productLinksArray;
    }

    public function getImageUrl() {
        return Yii::$app->urlManagerFrontEnd->createAbsoluteUrl($this->image);
    }

    public function getProductLinks()
    {
        return $this->hasMany(ProductLink::className(), ['product_id' => 'id']);
    }

    public function getProductGalleries()
    {
        return $this->hasMany(ProductGallery::className(), ['product_id' => 'id']);
    }
}
