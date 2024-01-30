<?php

namespace frontend\controllers;

use common\helpers\Helper;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use frontend\models\Books;
use frontend\models\search\BooksSearch;

/**
 * Class BooksController
 * @package frontend\controllers
 */
class BooksController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }


    public function actionUpdate($id = false)
    {
        $model = Books::createOrUpdate($id);

        $isNew = $model->isNewRecord;
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $fileName = Helper::gen(10);
            $model->image = $fileName.'.'.$model->imageFile->extension;
            if ($model->validate()) {
                $model->save();
                $model->imageFile->saveAs(Yii::getAlias("@uploads/{$model->image}"));
                Yii::$app->session->setFlash('success', ($isNew) ? 'Create success' : 'Update success');
                return $this->redirect(['/books/index']);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionCreate()
    {
        return $this->actionUpdate(false);
    }


    public function actionView($id)
    {
        $model = Books::findOne($id);
        return $this->render('view', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Books::findOne($id);
        if ($model) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Deleted!');
        }
        return $this->redirect(['/books/index']);
    }
}
