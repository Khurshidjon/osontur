<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "telegram_user".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $username
 * @property string|null $telegram_id
 * @property string|null $user_id
 * @property int|null $step
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class TelegramUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['step', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'username', 'telegram_id', 'user_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'username' => 'Username',
            'telegram_id' => 'Telegram ID',
            'user_id' => 'User ID',
            'step' => 'Step',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
