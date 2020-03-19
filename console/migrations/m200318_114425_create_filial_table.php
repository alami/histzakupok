<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%filial}}`.
 */
class m200318_114425_create_filial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%filial}}', [
            'id' => $this->primaryKey(),
            'name_ru' => $this->string()->notNull()->unique(),
            'name_uz' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%filial}}');
    }
}
