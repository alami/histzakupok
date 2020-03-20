<?php

use yii\db\Migration;
use backend\models\Helper;

/**
 * Handles the creation of table `{{%protocol}}`.
 */
class m200320_112738_create_protocol_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%protocol}}', [
            'id' => $this->primaryKey(),
            'bid_id' => $this->integer(),
            'number' => $this->string(),
            'date' => $this->dateTime(),
            'cost'=> $this->float(),
            'currency_id' => $this->smallInteger()->notNull()->defaultValue(Helper::CURRENCY_SUM),
            'org_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->createIndex('{{%index-protocol-bid_id}}', '{{%protocol}}', 'bid_id');
        $this->addForeignKey('{{%fk-protocol-bid_id}}', '{{%protocol}}', 'bid_id', '{{%bid}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-protocol-org_id}}', '{{%protocol}}', 'org_id');
        $this->addForeignKey('{{%fk-protocol-org_id}}', '{{%protocol}}', 'org_id', '{{%org}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-protocol-created_by}}', '{{%protocol}}', 'created_by');
        $this->addForeignKey('{{%fk-protocol-created_by}}', '{{%protocol}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-protocol-updated_by}}', '{{%protocol}}', 'updated_by');
        $this->addForeignKey('{{%fk-protocol-updated_by}}', '{{%protocol}}', 'updated_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-protocol-bid_id}}', '{{%protocol}}');
        $this->dropIndex('{{%index-protocol-bid_id}}', '{{%protocol}}');
        $this->dropForeignKey('{{%fk-protocol-org_id}}', '{{%protocol}}');
        $this->dropIndex('{{%index-protocol-org_id}}', '{{%protocol}}');
        $this->dropForeignKey('{{%fk-protocol-created_by}}', '{{%protocol}}');
        $this->dropIndex('{{%index-protocol-created_by}}', '{{%protocol}}');
        $this->dropForeignKey('{{%fk-protocol-updated_by}}', '{{%protocol}}');
        $this->dropIndex('{{%index-protocol-updated_by}}', '{{%protocol}}');
        $this->dropTable('{{%protocol}}');
    }
}
