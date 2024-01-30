<?php

namespace frontend\models;


use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use common\models\BaseActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 * @property float $price
 * @property Authors $author
 */
class Books extends BaseActiveRecord
{
    public $imageFile;
    public static function find()
    {
        return new ActiveQuery(get_called_class());
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['title', 'author_id', 'price'], 'required'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 50],
            [['text', 'text'], 'string'],
            [['title'], 'trim'],
            [['updated_at', 'created_at'], 'safe'],
            [['text'], 'default']
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

    public function beforeSave($insert)
    {
        $this->author_id = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }

}
