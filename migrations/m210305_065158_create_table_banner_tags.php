<?php

use yii\db\Migration;

/**
 * Class m210305_065158_create_table_banner_tags
 */
class m210305_065158_create_table_banner_tags extends Migration
{
    public function up()
    {
        $this->createTable('banner_tags', [
            'banner_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        // creates index for column 'banner_id'
        $this->createIndex(
            'idx-banner_tags-banner_id',
            'banner_tags',
            'banner_id'
        );

        // add foreign key for table `banner_id`
        $this->addForeignKey(
            'fk-banner_tags-banner_id',
            'banner_tags',
            'banner_id',
            'banners',
            'id',
            'CASCADE'
        );

        // creates index for column 'tag_id'
        $this->createIndex(
            'idx-banner_tags-tag_id',
            'banner_tags',
            'tag_id'
        );

        // add foreign key for table `tag_id`
        $this->addForeignKey(
            'fk-banner_tags-tag_id',
            'banner_tags',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );
    }
}
