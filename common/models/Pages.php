<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $content_uz
 * @property string|null $content_ru
 * @property string|null $content_en
 * @property string|null $image
 * @property int|null $menu_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{
    public $photo;
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
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_ru', 'title_en'], 'string', 'max' => 255],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png', 'maxFiles' => 1],
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
            'content_uz' => 'Content Uz',
            'content_ru' => 'Content Ru',
            'content_en' => 'Content En',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function translate($model)
    {
        $lang = Yii::$app->language;
        return $this[$model.'_'.$lang];
    }

    public static function wallpaper($avatar)
    {
        $base_directory = __DIR__ . '/../../frontend/web/osonturPages';
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
