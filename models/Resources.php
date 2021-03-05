<?php

namespace app\models;

use Yii;

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
}
