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
 * @property string|null $message
 * @property string|null $email
 * @property string|null $answer_from_phone
 * @property string|null $answer_from_email
 * @property int|null $destination_id
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
        if (!$this->answer_from_email){
            $answer_rules_row = [['email'], 'safe'];
        }else{
            $answer_rules_row = [['email'], 'required'];
        }

        return [
            [['status', 'created_at', 'updated_at', 'answer_from_email', 'answer_from_phone', 'destination_id'], 'integer'],
            [['fio', 'phone_number', 'email'], 'string', 'max' => 255],
            [['message'], 'string', 'max' => 500],
            [['fio', 'phone_number'], 'required'],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Lfj2NQkAAAAAFBFzBCjxOMHIsi4zh_BgVt8Kf_P'],
            $answer_rules_row,
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

    public function getDestination()
    {
        return $this->hasOne(Destinations::class, ['id' => 'destination_id']);
    }

    public function titleLoc()
    {
        $lang = Yii::$app->language;
        $res = 'title_uz';
        if ($lang == 'uz'){
            $res = 'title_uz';
        }elseif($lang == 'ru'){
            $res = 'title_ru';
        }else{
            $res = 'title_en';
        }
        return $res;
    }
}
