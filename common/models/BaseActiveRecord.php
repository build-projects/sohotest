<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Class BaseActiveRecord
 * @package common\models
 *
 * @property string $created_at
 * @property string $updated_at
 */
class BaseActiveRecord extends ActiveRecord
{
    /**
     * @param null $id
     * @return BaseActiveRecord|static|null
     * @throws NotFoundHttpException
     */
    public static function findModel($id = null)
    {

        if (($model = static::findOne($id)) !== null) {
            return $model;
        } else {
            if (!$id)
                return new static();

        }
        throw new NotFoundHttpException();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d H:i:s');
        } else {
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    /**
     * @param $condition
     * @return BaseActiveRecord
     * @throws NotFoundHttpException
     */
    public static function findById($condition)
    {
        $model = parent::findOne($condition);
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}
