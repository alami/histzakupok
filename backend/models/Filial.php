<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "filial".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_uz
 *
 * @property User[] $users
 */
class Filial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_uz'], 'required'],
            [['name_ru', 'name_uz'], 'string', 'max' => 255],
            [['name_ru'], 'unique'],
            [['name_uz'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_uz' => 'Name Uz',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['filial_id' => 'id']);
    }
}
