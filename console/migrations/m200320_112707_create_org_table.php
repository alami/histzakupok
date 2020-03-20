<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%org}}`.
 */
class m200320_112707_create_org_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%org}}', [
            'id' => $this->primaryKey(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            ]);
        $this->createIndex('{{%index-org-created_by}}', '{{%org}}', 'created_by');
        $this->addForeignKey('{{%fk-org-created_by}}', '{{%org}}', 'created_by', '{{%user}}', 'id');
        $this->createIndex('{{%index-org-updated_by}}', '{{%org}}', 'updated_by');
        $this->addForeignKey('{{%fk-org-updated_by}}', '{{%org}}', 'updated_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-org-created_by}}', '{{%org}}');
        $this->dropIndex('{{%index-org-created_by}}', '{{%org}}');
        $this->dropForeignKey('{{%fk-org-updated_by}}', '{{%org}}');
        $this->dropIndex('{{%index-org-updated_by}}', '{{%org}}');
        $this->dropTable('{{%org}}');
    }
}
