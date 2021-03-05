<?php

use yii\db\Migration;

/**
 * Class m210305_062717_create_table_resources
 */
class m210305_062717_create_table_resources extends Migration
{
    public function up()
    {
        $this->createTable('resources', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }
}
