<?php

use backend\models\Helper;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 */
class m200324_091137_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'bid_id' => $this->integer(),
            'document_type' => $this->string()->Null(), //['bid','aggreement','protocol']
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
        $this->createIndex('{{%index-document-bid_id}}', '{{%document}}', 'bid_id');
        $this->addForeignKey('{{%fk-document-bid_id}}', '{{%document}}', 'bid_id', '{{%bid}}', 'id', 'SET NULL', 'SET NULL');
        $this->createIndex('{{%index-document-created_by}}', '{{%document}}', 'created_by');
        $this->addForeignKey('{{%fk-document-created_by}}', '{{%document}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-document-updated_by}}', '{{%document}}', 'updated_by');
        $this->addForeignKey('{{%fk-document-updated_by}}', '{{%document}}', 'updated_by', '{{%user}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-document-bid_id}}', '{{%document}}');
        $this->dropIndex('{{%index-document-bid_id}}', '{{%document}}');
        $this->dropForeignKey('{{%fk-document-created_by}}', '{{%document}}');
        $this->dropIndex('{{%index-document-created_by}}', '{{%document}}');
        $this->dropForeignKey('{{%fk-document-updated_by}}', '{{%document}}');
        $this->dropIndex('{{%index-document-updated_by}}', '{{%document}}');

        $this->dropTable('{{%document}}');
    }
}
