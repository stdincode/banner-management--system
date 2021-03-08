<?php

namespace app\modules\controllers;

//use yii\web\Controller;
use yii\rest\Controller;

/**
 * Default controller for the `modules` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return ['sre'=>'opp'];
    }

//    protected function verbs()
//    {
//        return [
//            'index' => ['GET', 'HEAD'],
//        ];
//    }
}
