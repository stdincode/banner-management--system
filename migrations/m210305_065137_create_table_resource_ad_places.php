<?php

use yii\db\Migration;

/**
 * Class m210305_065137_create_table_resource_ad_places
 */
class m210305_065137_create_table_resource_ad_places extends Migration
{
    public function up()
    {
        $this->createTable('resource_ad_places', [
            'resource_id' => $this->integer()->notNull(),
            'ad_place_id' => $this->integer()->notNull(),
        ]);

        // creates index for column 'resource_id'
        $this->createIndex(
            'idx-resource_ad_places-resource_id',
            'resource_ad_places',
            'resource_id'
        );

        // add foreign key for table `resource_id`
        $this->addForeignKey(
            'fk-resource_ad_places-resource_id',
            'resource_ad_places',
            'resource_id',
            'resources',
            'id',
            'CASCADE'
        );

        // creates index for column 'ad_place_id'
        $this->createIndex(
            'idx-resource_ad_places-ad_place_id',
            'resource_ad_places',
            'ad_place_id'
        );

        // add foreign key for table `ad_place_id`
        $this->addForeignKey(
            'fk-resource_ad_places-ad_place_id',
            'resource_ad_places',
            'ad_place_id',
            'ad_places',
            'id',
            'CASCADE'
        );
    }
}
