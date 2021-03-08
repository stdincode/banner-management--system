<?php

namespace app\modules\models;


class Resources extends \app\models\Resources
{
    use ResourceAndBannerTrait;

    public function extraFields()
    {
        return [
            'name_ad_places' => function($model) {
                return $this->getAdPlaceList($model->resourceAdPlaces);
            },
        ];
    }
}