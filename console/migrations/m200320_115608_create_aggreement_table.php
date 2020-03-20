<?php

use yii\db\Migration;
use backend\models\Helper;

/**
 * Handles the creation of table `{{%aggreement}}`.
 */
class m200320_115608_create_aggreement_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aggreement}}', [
            'id' => $this->primaryKey(),
            'bid_id' => $this->integer(),
            'number' => $this->string(),
            'date' => $this->dateTime(),
            'cost'=> $this->float(),
            'currency_id' => $this->smallInteger()->notNull()->defaultValue(Helper::CURRENCY_SUM),
            'finance_id' => $this->smallInteger()->notNull()->defaultValue(Helper::FINANCE_BUDGET),
            'org_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->createIndex('{{%index-aggreement-bid_id}}', '{{%aggreement}}', 'bid_id');
        $this->addForeignKey('{{%fk-aggreement-bid_id}}', '{{%aggreement}}', 'bid_id', '{{%bid}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-aggreement-org_id}}', '{{%aggreement}}', 'org_id');
        $this->addForeignKey('{{%fk-aggreement-org_id}}', '{{%aggreement}}', 'org_id', '{{%org}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-aggreement-created_by}}', '{{%aggreement}}', 'created_by');
        $this->addForeignKey('{{%fk-aggreement-created_by}}', '{{%aggreement}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-aggreement-updated_by}}', '{{%aggreement}}', 'updated_by');
        $this->addForeignKey('{{%fk-aggreement-updated_by}}', '{{%aggreement}}', 'updated_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-aggreement-bid_id}}', '{{%aggreement}}');
        $this->dropIndex('{{%index-aggreement-bid_id}}', '{{%aggreement}}');
        $this->dropForeignKey('{{%fk-aggreement-org_id}}', '{{%aggreement}}');
        $this->dropIndex('{{%index-aggreement-org_id}}', '{{%aggreement}}');
        $this->dropForeignKey('{{%fk-aggreement-created_by}}', '{{%aggreement}}');
        $this->dropIndex('{{%index-aggreement-created_by}}', '{{%aggreement}}');
        $this->dropForeignKey('{{%fk-aggreement-updated_by}}', '{{%aggreement}}');
        $this->dropIndex('{{%index-aggreement-updated_by}}', '{{%aggreement}}');
        $this->dropTable('{{%aggreement}}');
    }
}
