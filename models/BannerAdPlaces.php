<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner_ad_places".
 *
 * @property int $banner_id
 * @property int $ad_place_id
 *
 * @property AdPlaces $adPlace
 * @property Banners $banner
 */
class BannerAdPlaces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner_ad_places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banner_id', 'ad_place_id'], 'required'],
            [['banner_id', 'ad_place_id'], 'default', 'value' => null],
            [['banner_id', 'ad_place_id'], 'integer'],
            [['ad_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdPlaces::className(), 'targetAttribute' => ['ad_place_id' => 'id']],
            [['banner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Banners::className(), 'targetAttribute' => ['banner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'ad_place_id' => 'Ad Place ID',
        ];
    }

    /**
     * Gets query for [[AdPlace]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdPlace()
    {
        return $this->hasOne(AdPlaces::className(), ['id' => 'ad_place_id']);
    }

    /**
     * Gets query for [[Banner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBanner()
    {
        return $this->hasOne(Banners::className(), ['id' => 'banner_id']);
    }
}
