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
}