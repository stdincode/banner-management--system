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
     * Gets query for [[AdPlace]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdPlace()
    {
        return $this->hasOne(AdPlaces::className(), ['id' => 'ad_place_id']);
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
}
