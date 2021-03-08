<?php


namespace app\modules\models;


class Tags extends \app\models\Tags
{
    public function fields()
    {
        return [
            'id',
            'name',
        ];
    }
}