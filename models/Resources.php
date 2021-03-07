<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "resources".
 *
 * @property int $id
 * @property string $name
 *
 * @property ResourceAdPlaces[] $resourceAdPlaces
 */
class Resources extends \yii\db\ActiveRecord
{
    public $adPlaceIds;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resources';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['adPlaceIds'], 'safe'],
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
     * Gets query for [[ResourceAdPlaces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResourceAdPlaces()
    {
        return $this->hasMany(ResourceAdPlaces::className(), ['resource_id' => 'id']);
    }

    /**
     * Gets query for [[adPlaceIds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdPlaces()
    {
        $this->hasMany(AdPlaces::className(), ['id' => 'ad_place_id'])->via('resourceAdPlaces');
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        ResourceAdPlaces::deleteAll(['resource_id' => $this->id]);
        if (!empty($this->adPlaceIds)) {
            ResourceAdPlaces::writeData($this->id, $this->adPlaceIds);
        }
    }
}
