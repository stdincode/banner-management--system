<?php

namespace app\modules\models;


use yii\base\Exception;

class Banners extends \app\models\Banners
{
    use ResourceAndBannerTrait;

    public function extraFields()
    {
        return [
            'name_ad_places' => function($model) {
                return $this->getAdPlaceList($model->bannerAdPlaces);
            },
        ];
    }

    public static function getBannerIdByResourcesAndAdPlaceAndTag($resource_id, $ad_place_ids, $tag_ids) {
        $command = (new \yii\db\Query())
            ->select(['banner_ad_places.banner_id'])
            ->from('banner_ad_places')
            ->innerJoin('resource_ad_places', 'resource_ad_places.ad_place_id = banner_ad_places.ad_place_id')
            ->leftJoin('banner_tags', 'banner_ad_places.banner_id = banner_tags.banner_id')
            ->where(['resource_ad_places.resource_id' => $resource_id])
            ->andWhere(['in', 'resource_ad_places.ad_place_id', $ad_place_ids])
            ->andWhere(['in', 'banner_tags.tag_id', $tag_ids])
            ->createCommand();
        return $command->queryAll();
    }

    public static function getBannerIdByResourcesAndAdPlace($resource_id, $ad_place_ids) {
        $command = (new \yii\db\Query())
            ->select(['banner_ad_places.banner_id'])
            ->from('banner_ad_places')
            ->innerJoin('resource_ad_places', 'resource_ad_places.ad_place_id = banner_ad_places.ad_place_id')
            ->where(['resource_ad_places.resource_id' => $resource_id])
            ->andWhere(['in', 'resource_ad_places.ad_place_id', $ad_place_ids])
            ->createCommand();
        return $command->queryAll();
    }
}