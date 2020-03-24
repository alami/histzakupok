<?php

use yii\db\Migration;
use backend\models\Helper;

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
            'filial_id' => $this->integer(),
            'name_ru' => $this->string()->notNull(),
            'name_uz' => $this->string(), //->notNull(),
            'max_cost'=> $this->float(),
            'currency_id' => $this->smallInteger()->notNull()->defaultValue(Helper::CURRENCY_SUM),
            'bid_status' => $this->smallInteger()->notNull()->defaultValue(Helper::BID_CREATED),
            'lot_number' => $this->integer(),
            'lot link' => $this->string(),
            'lot_start' => $this->dateTime(),
            'lot_end'   => $this->dateTime(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->createIndex('{{%index-bid-filial_id}}', '{{%bid}}', 'filial_id');
        $this->addForeignKey('{{%fk-bid-filial_id}}', '{{%bid}}', 'filial_id', '{{%filial}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-bid-created_by}}', '{{%bid}}', 'created_by');
        $this->addForeignKey('{{%fk-bid-created_by}}', '{{%bid}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-bid-updated_by}}', '{{%bid}}', 'updated_by');
        $this->addForeignKey('{{%fk-bid-updated_by}}', '{{%bid}}', 'updated_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-bid-filial_id}}', '{{%bid}}');
        $this->dropIndex('{{%index-bid-filial_id}}', '{{%bid}}');
        $this->dropForeignKey('{{%fk-bid-created_by}}', '{{%bid}}');
        $this->dropIndex('{{%index-bid-created_by}}', '{{%bid}}');
        $this->dropForeignKey('{{%fk-bid-updated_by}}', '{{%bid}}');
        $this->dropIndex('{{%index-bid-updated_by}}', '{{%bid}}');
        $this->dropTable('{{%bid}}');
    }
}
