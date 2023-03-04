<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "destinations".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $wallpaper
 * @property int|null $is_banner
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Destinations extends \yii\db\ActiveRecord
{

    public $image;

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
        return 'destinations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_banner', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'wallpaper'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png', 'maxFiles' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Title Uz',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'wallpaper' => 'Wallpaper',
            'is_banner' => 'Is Banner',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function wallpaper($avatar)
    {
        $base_directory = __DIR__ . '/../../frontend/web/destinationFiles';
        $new_directory = $base_directory . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $inside_directory = '/' . date('Y') . '/' . date('m') . '/' . date('d');
        if ($avatar != null) {
            if (!is_dir($new_directory)) {
                mkdir($new_directory, 0777, true);
            }
            $filename = substr(sha1($avatar->baseName), 0, 20) . date("d-m-Y-H") . '.' . $avatar->extension;
            $file_dir = $new_directory . '/' . $filename;
            $avatar->saveAs($file_dir);
            $src = $inside_directory . '/' . $filename;
            return $src;
        }
    }
}
