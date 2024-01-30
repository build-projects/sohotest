<?php

namespace frontend\controllers;

use frontend\models\search\BooksSearch;
use Yii;
use yii\web\Controller;
use frontend\models\Authors;
use frontend\models\search\AuthorsSearch;

/**
 * Class AuthorsController
 * @package frontend\controllers
 */
class AuthorsController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new AuthorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }


    public function actionUpdate($id = false)
    {
        $model = Authors::createOrUpdate($id);

        $isNew = $model->isNewRecord;
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            if ($model->validate()) {
                $model->save();

                Yii::$app->session->setFlash('success', ($isNew) ? 'Create success' : 'Update success');
                return $this->redirect(['/authors/index']);
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
        $model = Authors::findOne($id);

        $searchModel = new BooksSearch();
        $searchModel->author_id = $model->id;
       // $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        //return $this->render('index', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);



        return $this->render('view', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Authors::findOne($id);
        if ($model) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Deleted!');
        }
        return $this->redirect(['/authors/index']);
    }
}
