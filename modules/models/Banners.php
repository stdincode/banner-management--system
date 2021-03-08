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
                return $this->getPlaceNamesList($model->bannerAdPlaces);
            },
        ];
    }

    public static function getBannerIdByResourcesAndAdPlaceAndTag($resource_id, $ad_place_ids, $tag_ids) {
        if (is_array($ad_place_ids) && is_array($tag_ids)) {
            $sql = "
                select bp.banner_id
                from banner_ad_places as bp join resource_ad_places as rp
                on rp.ad_place_id = bp.ad_place_id
                left join banner_tags as bt
                on bp.banner_id = bt.banner_id
                where
                    rp.resource_id = :resource_id and
                    rp.ad_place_id in (:ad_place_ids) and
                    bt.tag_id in (:tag_ids)
                group by bp.banner_id;
            ";
            return \Yii::$app->db->createCommand($sql, [
                ':resource_id' => $resource_id,
                ':ad_place_ids' => count($ad_place_ids) == 1 ? $ad_place_ids[0] : $ad_place_ids ,
                ':tag_ids' => count($tag_ids) == 1 ? $tag_ids[0] : $tag_ids,
            ])->execute();
        } else {
            throw new Exception('ad_place_ids и tag_ids необходимо передавать как нумерованные массивы');
        }
    }

    public static function getBannerIdByResourcesAndAdPlace($resource_id, $ad_place_ids) {
        if (is_array($ad_place_ids)) {
            $sql = "
                    select bp.banner_id
                    from banner_ad_places as bp join resource_ad_places as rp
                    on rp.ad_place_id = bp.ad_place_id
                    where
                        rp.resource_id = :resource_id and
                        rp.ad_place_id in (:ad_place_ids)
                    group by bp.banner_id;
                ";
            return \Yii::$app->db->createCommand($sql, [
                ':resource_id' => $resource_id,
                ':ad_place_ids' => count($ad_place_ids) == 1 ? $ad_place_ids[0] : $ad_place_ids,
            ])->execute();
        } else {
            throw new Exception('ad_place_ids необходимо передавать как нумерованный массив');
        }
    }
}