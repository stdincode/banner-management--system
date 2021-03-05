<?php

use yii\db\Migration;

/**
 * Class m210305_065131_create_table_tags
 */
class m210305_065131_create_table_tags extends Migration
{
    public function up()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }
}
