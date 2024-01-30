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


    public function actionUpdate($id = null)
    {
        $model = Authors::findModel($id);

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
        return $this->actionUpdate(null);
    }

    public function actionView($id)
    {
        $model = Authors::findById($id);

        $searchModel = new BooksSearch();
        $searchModel->author_id = $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionDelete($id)
    {
        $model = Authors::findOne($id);
        if ($model) {
            //Здесь можно еще сделать удаление всех книг автора.
            $model->delete();
            Yii::$app->session->setFlash('success', 'Deleted!');

        }
        return $this->redirect(['/authors/index']);
    }
}
