<?php


namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * Trait BaseResourceAndBannerTrait
 * @package app\models
 */
trait BaseResourceAndBannerTrait
{

    /**
     * @param $thisAdPlacesIds
     * @return array
     */
    public function getAdPlaceList($thisAdPlacesIds)
    {
        if (is_array($thisAdPlacesIds)) {
            if (!empty($thisAdPlacesIds)) {
                $thisAdPlacesIds = ArrayHelper::map($thisAdPlacesIds, 'ad_place_id', 'ad_place_id');
                return AdPlaces::find()->where(['in', 'id', $thisAdPlacesIds])->asArray()->all();
            }
        }

        return $thisAdPlacesIds;
    }
}