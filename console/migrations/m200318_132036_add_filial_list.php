<?php

use yii\db\Migration;

/**
 * Class m200318_132036_add_filial_list
 */
class m200318_132036_add_filial_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('%filial', ['name_ru', 'name_uz'], [
            ['город Ташкент', 'Toshkent shahar'],
            ['Самаркандская область', 'Samarqand viloyati'],
            ['Джизакская область', 'Jizzax viloyati'],
            ['Андижанская область', 'Andijon viloyati'],
            ['Сырдарьинская область', 'Sirdaryo viloyati'],
            ['Навоийская область', 'Navoiy viloyati'],
            ['Хорезмская область', 'Xorazm viloyati'],
            ['Ферганская область', 'Farg\'ona viloyati'],
            ['Сурхандарьинская область', 'Surxondaryo viloyati'],
            ['Бухарская область', 'Buxoro viloyati'],
            ['Кашкадарьинская область', 'Qashqadaryo viloyati'],
            ['Республика Каракалпакстан', 'Qoraqalpog\'iston Respublikasi'],
            ['Ташкентская область', 'Toshkent viloyati'],
            ['Наманганская область', 'Namangan viloyati'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200318_132036_add_filial_list cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200318_132036_add_filial_list cannot be reverted.\n";

        return false;
    }
    */
}
