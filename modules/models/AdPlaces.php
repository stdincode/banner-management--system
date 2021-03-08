<?php


namespace app\modules\models;


class AdPlaces extends \app\models\AdPlaces
{
    public function fields()
    {
        return [
            'id',
            'name',
            'height',
            'width',
        ];
    }
}