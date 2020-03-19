<?php

use yii\db\Migration;

class m200318_120210_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'fio_ru' => $this->string(),
            'fio_uz' => $this->string(),
            'filial_id' => $this->integer(),
            'department' => $this->string(),
            'position' => $this->string(),
            'phone' => $this->string(),
            'mobile' => $this->string(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'verification_token' => $this->string()->defaultValue(null),
            'role' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('{{%index-user-filial_id}}', '{{%user}}', 'filial_id');
        $this->addForeignKey('{{%fk-user-filial_id}}', '{{%user}}', 'filial_id', '{{%filial}}', 'id', 'SET NULL', 'SET NULL');

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
