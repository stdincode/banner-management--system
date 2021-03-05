<?php

use yii\db\Migration;

/**
 * Class m210305_065113_create_table_ad_places
 */
class m210305_065113_create_table_ad_places extends Migration
{
    public function up()
    {
        $this->createTable('ad_places', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'height' => $this->integer()->notNull(),
            'width' => $this->integer()->notNull(),
        ]);
    }
}
