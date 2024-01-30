<?php

namespace common\models;

use yii\db\ActiveRecord;

class BaseActiveRecord extends ActiveRecord
{

    /**
     * @param null $id
     * @return array|BaseActiveRecord|ActiveRecord
     */
    public static function createOrUpdate($id = null)
    {
        $model = static::findOne($id);

        if ($model) {
            return $model;
        }
        return new static;
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d H:i:s');
        } else {
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
