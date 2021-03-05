<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string $name
 *
 * @property BannerAdPlaces[] $bannerAdPlaces
 * @property BannerTags[] $bannerTags
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[BannerAdPlaces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBannerAdPlaces()
    {
        return $this->hasMany(BannerAdPlaces::className(), ['banner_id' => 'id']);
    }

    /**
     * Gets query for [[BannerTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBannerTags()
    {
        return $this->hasMany(BannerTags::className(), ['banner_id' => 'id']);
    }
}
