<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

class Post extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = 5;

    const IMAGE_SQUARE = 1;
    const IMAGE_HORIZONTAL = 2;
    const IMAGE_VERTICAL = 3;

    public $imageFile;

    public $x;
    public $y;
    public $w;
    public $h;
    public $scale;
    public $angle;

    public $_lastUserActions;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'imageFile'], 'required'],
            [['user_id', 'score', 'status', 'created_at', 'updated_at', 'is_from_ig', 'ig_parse_data_id', 'image_orientation', 'type'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

            [['x', 'y', 'w', 'h', 'scale', 'angle'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, jpeg, png', 'maxSize' => 1024 * 1024 * 10, 'tooBig' => 'Изображение не должно быть больше 10Мб', 'checkExtensionByMimeType'=>false],
        ];
    }  

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['parse'] = ['ig_parse_data_id'];
        return $scenarios;
    }

    public function behaviors() {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'week_id' => 'Неделя',
            'imageFile' => 'Фото',
            'score' => 'Баллы',
            'status' => 'Статус',
            'is_from_ig' => 'Из инстаграма',
            'image' => 'Изображение',
            'created_at' => 'Дата/Время создания',
            'updated_at' => 'Время последнего изменения',
            'type' => 'Тип',
        ];
    }

    public function afterDelete() {
        $path = $this->imageSrcPath;
        if(file_exists($path.$this->image) && is_file($path.$this->image)) {
            unlink($path.$this->image);
        }
        return parent::afterDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getWeek()
    {
        return $this->hasOne(Week::className(), ['id' => 'week_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostActions()
    {
        return $this->hasMany(PostAction::className(), ['post_id' => 'id']);
    }

    public function getUrl() {
        return Url::toRoute(['/site/post', 'id'=>$this->id]);
    }

    public function getImageSrcPath() {
        return __DIR__ . '/../../frontend/web/uploads/post/'.$this->user_id.'/';
    }

    public function getImageUrl() {
        return Yii::$app->urlManagerFrontEnd->createAbsoluteUrl('/uploads/post/'.$this->user_id.'/'.$this->image);
    }

    // public static function getImageUrl($user_id, $image) {
    //     return Yii::$app->urlManagerFrontEnd->createAbsoluteUrl('/uploads/post/'.$user_id.'/'.$image);
    // }

    public static function getStatusArray() {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_BANNED => 'Забанен',
        ];
    }

    public function getStatusLabel() {
        return self::getStatusArray()[$this->status];
    }

    public static function getTypeArray() {
        return [
            1 => 'МЭЙКАП ДЛЯ ХЭЛЛОУИНА',
            2 => 'МЭЙКАП В СТИЛЕ КОМИКСОВ',
        ];
    }

    public function getTypeLabel() {
        return self::getTypeArray()[$this->type];
    }

    public function getLastUserActions() {
        if($this->_lastUserActions === null) {
            $this->_lastUserActions = PostAction::find()
                ->select(['MAX(id) as last_user_action_id', 'MAX(created_at) as last_user_action_time', 'type'])
                ->where(['user_id'=>Yii::$app->user->id, 'post_id'=>$this->id])
                ->groupBy('type, post_id')
                ->orderBy('id DESC, type')
                ->indexBy('type')
                ->asArray()
                ->all();
        }
        return $this->_lastUserActions;
    }

    public function userCan($type) {
        if(isset($this->lastUserActions[$type]) && !PostAction::userCanDo($this->lastUserActions[$type]['last_user_action_time'])) {
            return false;
        }

        return true;
    }

    public function getCssClass() {
        if($this->is_from_ig) {
            switch ($this->image_orientation) {
                case self::IMAGE_SQUARE:
                    $class = 'w280-h280';
                    break;
                case self::IMAGE_HORIZONTAL:
                    $class = 'w600-h280';
                    break;
                case self::IMAGE_VERTICAL:
                    $class = 'w280-h600';
                    break;
            }

            return $class;
        }
    }
}
