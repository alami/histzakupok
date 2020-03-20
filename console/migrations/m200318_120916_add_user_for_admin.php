<?php

use yii\db\Migration;
use backend\models\Helper;

/**
 * Class m200320_070916_add_user_for_admin
 */
class m200318_120916_add_user_for_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('%user', ['username', 'email', 'password_hash',
            'filial_id',
            'status', 'role','created_at','updated_at'], [

             1,
            Helper::STATUS_ACTIVE , Helper::ROLE_ADMIN,time(),time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200320_070916_add_user_for_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200320_070916_add_user_for_admin cannot be reverted.\n";

        return false;
    }
    */
}
