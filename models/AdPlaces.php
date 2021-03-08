<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_places".
 *
 * @property int $id
 * @property string $name
 * @property int $height
 * @property int $width
 *
 * @property BannerAdPlaces[] $bannerAdPlaces
 * @property ResourceAdPlaces[] $resourceAdPlaces
 */
class AdPlaces extends \yii\db\ActiveRecord
{
    use BaseLinkingTablesTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'height', 'width'], 'required'],
            [['height', 'width'], 'default', 'value' => null],
            [['height', 'width'], 'integer'],
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
            'height' => 'Height',
            'width' => 'Width',
        ];
    }

    /**
     * Gets query for [[BannerAdPlaces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBannerAdPlaces()
    {
        return $this->hasMany(BannerAdPlaces::className(), ['ad_place_id' => 'id']);
    }

    /**
     * Gets query for [[ResourceAdPlaces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResourceAdPlaces()
    {
        return $this->hasMany(ResourceAdPlaces::className(), ['ad_place_id' => 'id']);
    }

    public static function getNamesList($ids)
    {
        if (!empty($ids)) {
            $result = [];
            foreach ($ids as $key => $item) {
                $result[] = self::find()->where(['id' => $item])->all();
            }
            return $result;
        }
        return $ids;
    }
}
