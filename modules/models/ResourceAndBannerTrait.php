<?php


namespace app\modules\models;
use app\models\AdPlaces;

/**
 * Trait ResourceAndBannerTrait
 *
 * @package app\modules\models
 */
trait ResourceAndBannerTrait
{

    public function fields()
    {
        return [
            'id',
            'name',
        ];
    }

    /**
     * @param $thisAdPlacesIds
     * @return array
     */
    public function getPlaceNamesList($thisAdPlacesIds)
    {
        if (!empty($thisAdPlacesIds)) {
            $result = [];
            foreach ($thisAdPlacesIds as $item) {
                $result[] = AdPlaces::findAll($item['ad_place_id']);
            }
            return $result;
        }
        return $thisAdPlacesIds;
    }
}