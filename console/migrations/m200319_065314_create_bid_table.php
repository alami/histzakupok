<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bid}}`.
 */
class m200319_065314_create_bid_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bid}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bid}}');
    }
}
