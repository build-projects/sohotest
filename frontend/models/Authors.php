<?php

namespace frontend\models;


use Yii;
use yii\db\ActiveQuery;
use common\models\BaseActiveRecord;


/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $biography
 * @property integer $created_at
 * @property integer $updated_at
 * @property Books $books
 */
class Authors extends BaseActiveRecord
{

    /**
     * @return ActiveQuery
     */
    public static function find()
    {
        return new ActiveQuery(get_called_class());
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%authors}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        $rules = [];

        $rules[] = [['biography', 'name'], 'required'];
        $rules[] = [['biography'], 'string', 'max' => 50];
        $rules[] = [['biography', 'name'], 'string'];
        $rules[] = [['biography'], 'trim'];
        //$rules[] = ['phone', 'panix\ext\telinput\PhoneInputValidator'];
        $rules[] = [['updated_at', 'created_at'], 'safe'];
        $rules[] = [['name', 'biography'], 'default'];

        return $rules;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id' => 'user_id']);
    }



}
