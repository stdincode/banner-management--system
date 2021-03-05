<?php

use yii\db\Migration;

/**
 * Class m210305_065151_create_table_banner_ad_places
 */
class m210305_065151_create_table_banner_ad_places extends Migration
{
    public function up()
    {
        $this->createTable('banner_ad_places', [
            'banner_id' => $this->integer()->notNull(),
            'ad_place_id' => $this->integer()->notNull(),
        ]);

        // creates index for column 'banner_id'
        $this->createIndex(
            'idx-banner_ad_places-banner_id',
            'banner_ad_places',
            'banner_id'
        );

        // add foreign key for table `banner_id`
        $this->addForeignKey(
            'fk-banner_ad_places-resource_id',
            'banner_ad_places',
            'banner_id',
            'banners',
            'id',
            'CASCADE'
        );

        // creates index for column 'ad_place_id'
        $this->createIndex(
            'idx-banner_ad_places-ad_place_id',
            'banner_ad_places',
            'ad_place_id'
        );

        // add foreign key for table `ad_place_id`
        $this->addForeignKey(
            'fk-banner_ad_places-ad_place_id',
            'banner_ad_places',
            'ad_place_id',
            'ad_places',
            'id',
            'CASCADE'
        );
    }
}
