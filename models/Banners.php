<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string $name
 * @property array $ad_place_ids
 * @property array $tag_ids
 *
 * @property BannerAdPlaces[] $bannerAdPlaces
 * @property BannerTags[] $bannerTags
 */
class Banners extends \yii\db\ActiveRecord
{
    use BaseResourceAndBannerTrait;

    public $ad_place_ids;
    public $tag_ids;

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
            [['ad_place_ids', 'tag_ids'], 'safe'],
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

    public function getTagsName($bannerTags) {
        if (!empty($bannerTags)) {
            $tagIds = ArrayHelper::map($bannerTags, 'tag_id', 'tag_id');
            return Tags::find()->where(['in', 'id', $tagIds])->asArray()->all();
        }
        return $bannerTags;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (!empty($this->ad_place_ids)) {
            BannerAdPlaces::writeData($this->id, $this->ad_place_ids);
        }
        if (!empty($this->tag_ids)) {
            BannerTags::writeData($this->id, $this->tag_ids);
        }
    }
}
