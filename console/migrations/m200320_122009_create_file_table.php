<?php

use yii\db\Migration;
use backend\models\Helper;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m200320_122009_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'bid_id' => $this->integer(),
            'name' => $this->string(),
            'application_type' => $this->string()->notNull()->defaultValue(Helper::APPLICATION_TYPE[0]),
            'application_id' => $this->integer(),
            'lang' => $this->string(2),
            'file' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->createIndex('{{%index-file-bid_id}}', '{{%file}}', 'bid_id');
        $this->addForeignKey('{{%fk-file-bid_id}}', '{{%file}}', 'bid_id', '{{%bid}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-file-created_by}}', '{{%file}}', 'created_by');
        $this->addForeignKey('{{%fk-file-created_by}}', '{{%file}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-file-updated_by}}', '{{%file}}', 'updated_by');
        $this->addForeignKey('{{%fk-file-updated_by}}', '{{%file}}', 'updated_by', '{{%user}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-file-bid_id}}', '{{%file}}');
        $this->dropIndex('{{%index-file-bid_id}}', '{{%file}}');
        $this->dropForeignKey('{{%fk-file-created_by}}', '{{%file}}');
        $this->dropIndex('{{%index-file-created_by}}', '{{%file}}');
        $this->dropForeignKey('{{%fk-file-updated_by}}', '{{%file}}');
        $this->dropIndex('{{%index-file-updated_by}}', '{{%file}}');
        $this->dropTable('{{%file}}');
    }
}
