<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_related_filial}}`.
 */
class m200324_073324_create_user_related_filial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_related_filial}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'filial_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('{{%index-user_related_filial-user_id}}', '{{%user_related_filial}}', 'user_id');
        $this->addForeignKey('{{%fk-user_related_filial-user_id}}', '{{%user_related_filial}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->createIndex('{{%index-user_related_filial-filial_id}}', '{{%user_related_filial}}', 'filial_id');
        $this->addForeignKey('{{%fk-user_related_filial-filial_id}}', '{{%user_related_filial}}', 'filial_id', '{{%filial}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-user_related_filial-user_id}}', '{{%user_related_filial}}');
        $this->dropIndex('{{%index-user_related_filial-user_id}}', '{{%user_related_filial}}');
        $this->dropForeignKey('{{%fk-user_related_filial-filial_id}}', '{{%user_related_filial}}');
        $this->dropIndex('{{%index-user_related_filial-filial_id}}', '{{%user_related_filial}}');

        $this->dropTable('{{%user_related_filial}}');
    }
}
