<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner_tags".
 *
 * @property int $banner_id
 * @property int $tag_id
 *
 * @property Banners $banner
 * @property Tags $tag
 */
class BannerTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banner_id', 'tag_id'], 'required'],
            [['banner_id', 'tag_id'], 'default', 'value' => null],
            [['banner_id', 'tag_id'], 'integer'],
            [['banner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Banners::className(), 'targetAttribute' => ['banner_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * Gets query for [[Banner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBanner()
    {
        return $this->hasOne(Banners::className(), ['id' => 'banner_id']);
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}
