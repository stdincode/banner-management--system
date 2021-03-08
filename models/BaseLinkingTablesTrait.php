<?php


namespace app\models;
use yii\helpers\ArrayHelper;

trait BaseLinkingTablesTrait
{
    public static function getAllIdAndNameAsArray()
    {
        return ArrayHelper::map(self::find()->asArray()->all(), 'id', 'name');
    }
}