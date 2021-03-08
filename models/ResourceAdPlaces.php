<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resource_ad_places".
 *
 * @property int $resource_id
 * @property int $ad_place_id
 *
 * @property AdPlaces $adPlace
 * @property Resources $resource
 */
class ResourceAdPlaces extends \yii\db\ActiveRecord
{
    use BaseResourceAndBannerAdPlacesTrait;
    use BaseLinkingTablesTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource_ad_places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resource_id', 'ad_place_id'], 'required'],
            [['resource_id', 'ad_place_id'], 'default', 'value' => null],
            [['resource_id', 'ad_place_id'], 'integer'],
            [['ad_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdPlaces::className(), 'targetAttribute' => ['ad_place_id' => 'id']],
            [['resource_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resources::className(), 'targetAttribute' => ['resource_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'resource_id' => 'Resource ID',
            'ad_place_id' => 'Ad Place ID',
        ];
    }

    /**
     * Gets query for [[Resource]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResource()
    {
        return $this->hasOne(Resources::className(), ['id' => 'resource_id']);
    }

    public static function writeData(int $resource_id, array $ad_place_id)
    {
        foreach ($ad_place_id as $key => $value) {
            \Yii::$app->db->createCommand()->insert('resource_ad_places', [
                'resource_id' => $resource_id,
                'ad_place_id' => $value
            ])->execute();
        }
    }
}