<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "resources".
 *
 * @property int $id
 * @property string $name
 * @property array $ad_place_ids
 * @property array $formResourceAdPlaces
 *
 * @property ResourceAdPlaces[] $resourceAdPlaces
 */
class Resources extends \yii\db\ActiveRecord
{
    use BaseResourceAndBannerTrait;

    public $ad_place_ids;
    public $formResourceAdPlaces;

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
            [['ad_place_ids', 'formResourceAdPlaces'], 'safe'],
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
     * Gets query for [[ad_place_ids]].
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
        if (!empty($this->ad_place_ids)) {
            ResourceAdPlaces::writeData($this->id, $this->ad_place_ids);
        }
    }
}
