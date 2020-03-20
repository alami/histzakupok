<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lot}}`.
 */
class m200320_073820_create_lot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lot}}', [
            'id' => $this->primaryKey(),
            'bid_id' => $this->integer(),
            'link' => $this->string(),
            'datastart' => $this->dateTime(),
            'dataend'   => $this->dateTime(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->createIndex('{{%index-lot-bid_id}}', '{{%lot}}', 'bid_id');
        $this->addForeignKey('{{%fk-lot-bid_id}}', '{{%lot}}', 'bid_id', '{{%bid}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-lot-created_by}}', '{{%lot}}', 'created_by');
        $this->addForeignKey('{{%fk-lot-created_by}}', '{{%lot}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-lot-updated_by}}', '{{%lot}}', 'updated_by');
        $this->addForeignKey('{{%fk-lot-updated_by}}', '{{%lot}}', 'updated_by', '{{%user}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-lot-bid_id}}', '{{%lot}}');
        $this->dropIndex('{{%index-lot-bid_id}}', '{{%lot}}');
        $this->dropForeignKey('{{%fk-lot-created_by}}', '{{%lot}}');
        $this->dropIndex('{{%index-lot-created_by}}', '{{%lot}}');
        $this->dropForeignKey('{{%fk-lot-updated_by}}', '{{%lot}}');
        $this->dropIndex('{{%index-lot-updated_by}}', '{{%lot}}');
        $this->dropTable('{{%lot}}');
    }
}
