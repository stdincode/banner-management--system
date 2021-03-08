<?php


namespace app\models;


trait BaseResourceAndBannerAdPlacesTrait
{
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
     * @param array $selectedAdPlaceIds selected in form ids
     * @param int $modelId current id
     * @param string $tableName current linked table name
     * @param string $fieldName current linked field name
     * @return mixed
     */
    public static function batchInsertAdPlaces(array $selectedAdPlaceIds, int $modelId, string $tableName, string $fieldName)
    {
        $params = [];
        foreach ($selectedAdPlaceIds as $item) {
            $params[] = [$modelId, $item];
        }
        return self::find()->createCommand()->batchInsert($tableName, [$fieldName, 'ad_place_id'], $params)->execute();
    }
}