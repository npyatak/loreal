<?php

namespace common\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{
    public $productLinksArray;
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
}
