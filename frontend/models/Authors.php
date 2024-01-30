<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use common\models\BaseActiveRecord;


/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $name
 * @property string $biography
 * @property string $created_at
 * @property string $updated_at
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
        return [
            [['biography', 'name'], 'required'],
            [['biography'], 'string', 'max' => 50],
            [['biography', 'name'], 'string'],
            [['biography'], 'trim'],
            [['updated_at', 'created_at'], 'safe'],
            [['name', 'biography'], 'default']
        ];
    }


}
