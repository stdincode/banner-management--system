<?php

namespace app\modules\models;

use yii\web\Linkable;
use app\models\AdPlaces;

class Resources extends \app\models\Resources
{
    public function fields()
    {
        return [
            'id',
            'name',
        ];
    }

    public function extraFields()
    {
        return [
            'nameAdPlaces' => function($model) {
                return $this->getPlaceNamesList($model->resourceAdPlaces);
            },
        ];
    }

    /**
     * @param $resourceAdPlaces
     * @return array
     */
    public function getPlaceNamesList($resourceAdPlaces)
    {
        if (!empty($resourceAdPlaces)) {
            $result = [];
            foreach ($resourceAdPlaces as $item) {
                $result[] = AdPlaces::findAll($item['ad_place_id']);
            }
            return $result;
        }
        return $resourceAdPlaces;
    }
}