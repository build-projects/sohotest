<?php

namespace frontend\models;


use frontend\models\search\BooksSearch;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\FileHelper;
use common\models\BaseActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 * @property string $image
 * @property float $price
 * @property Authors $author
 * @property UploadedFile $cover
 */
class Books extends BaseActiveRecord
{
    public $cover;

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
            [['cover'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['title', 'author_id', 'price'], 'required'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 50],
            [['text', 'text'], 'string'],
            [['title'], 'trim'],
            [['updated_at', 'created_at', 'image'], 'safe'],
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

    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        FileHelper::unlink(Yii::getAlias("@uploads/{$this->image}"));
        parent::afterDelete();
    }
}
