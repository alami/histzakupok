<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bid_version}}`.
 */
class m200319_071520_create_bid_version_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bid_version}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bid_version}}');
    }
}
