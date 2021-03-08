<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $name
 *
 * @property BannerTags[] $bannerTags
 */
class Tags extends \yii\db\ActiveRecord
{
    use BaseLinkingTablesTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
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
     * Gets query for [[BannerTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBannerTags()
    {
        return $this->hasMany(BannerTags::className(), ['tag_id' => 'id']);
    }
}
