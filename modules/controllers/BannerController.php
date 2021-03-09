<?php


namespace app\modules\controllers;

use app\modules\models\Banners;
use yii\base\Exception;

/**
 * Tag controller for the `modules` module
 */
class BannerController extends BaseApiController
{
    public $modelClass = 'app\modules\models\Banners';

    public function actionGetBanner()
    {
        $resource_id = \Yii::$app->getRequest()->bodyParams['resource_id'] ?? false;
        $ad_place_ids = \Yii::$app->getRequest()->bodyParams['ad_place_ids']  ?? false;
        $tag_ids = \Yii::$app->getRequest()->bodyParams['tag_ids'] ?? false;
        if ($resource_id && $ad_place_ids && $tag_ids) {
            return Banners::getBannerIdByResourcesAndAdPlaceAndTag($resource_id, $ad_place_ids, $tag_ids);
        } elseif ($resource_id && $ad_place_ids) {
            return Banners::getBannerIdByResourcesAndAdPlace($resource_id, $ad_place_ids);
        }
        throw new Exception('Invalid input');;
    }
}