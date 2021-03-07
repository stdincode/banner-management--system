<?php

namespace app\modules\controllers;

//use yii\web\Controller;
use Yii;
use yii\rest\Controller;

/**
 * Tag controller for the `modules` module
 */
class TagController extends Controller
{
    protected function verbs()
    {
        return [
            'index' => ['GET', 'PUT'],
            'update' => ['PUT']
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->request->getIsPut()) {
            return $this->actionUpdate();
        }
        return ['sre' => 'tags1'];
    }

    public function actionUpdate()
    {
        return ['sre' => 'tags2'];
    }
}