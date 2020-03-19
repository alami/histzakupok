<?php

namespace backend\models;

use Yii;
use backend\models\Filial;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $fio_ru
 * @property string|null $fio_uz
 * @property int|null $filial_id
 * @property string|null $department
 * @property string|null $position
 * @property string|null $phone
 * @property string|null $mobile
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $verification_token
 * @property int $role
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Filial $filial
 */
class User extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['filial_id', 'role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'fio_ru', 'fio_uz', 'department', 'position', 'phone', 'mobile', 'email', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::class, 'targetAttribute' => ['filial_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'fio_ru' => 'Fio Ru',
            'fio_uz' => 'Fio Uz',
            'filial_id' => 'Filial ID',
            'department' => 'Department',
            'position' => 'Position',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'verification_token' => 'Verification Token',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Filial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filial::className(), ['id' => 'filial_id']);
    }
}
