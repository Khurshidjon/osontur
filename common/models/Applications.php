<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string|null $fio
 * @property string|null $phone_number
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Applications extends \yii\db\ActiveRecord
{

    public $reCaptcha;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['fio', 'phone_number'], 'string', 'max' => 255],
            [['fio', 'phone_number'], 'required'],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Lfj2NQkAAAAAFBFzBCjxOMHIsi4zh_BgVt8Kf_P']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'phone_number' => 'Phone Number',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
