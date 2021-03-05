<?php

use yii\db\Migration;

/**
 * Class m210305_065124_create_table_banners
 */
class m210305_065124_create_table_banners extends Migration
{
    public function up()
    {
        $this->createTable('banners', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }
}
