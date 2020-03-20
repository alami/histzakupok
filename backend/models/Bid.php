<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "bid".
 *
 * @property int $id
 * @property int|null $filial_id
 * @property string $name_ru
 * @property string|null $name_uz
 * @property float|null $max_cost
 * @property int $currency_id
 * @property int $bid_status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property Filial $filial
 * @property User $updatedBy
 */
class Bid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filial_id', 'currency_id', 'bid_status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name_ru', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['max_cost'], 'number'],
            [['name_ru', 'name_uz'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::className(), 'targetAttribute' => ['filial_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filial_id' => 'Filial ID',
            'name_ru' => 'Name Ru',
            'name_uz' => 'Name Uz',
            'max_cost' => 'Max Cost',
            'currency_id' => 'Currency ID',
            'bid_status' => 'Bid Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Filial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filial::class, ['id' => 'filial_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }
}
