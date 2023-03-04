<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "menus".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $link_path
 * @property int|null $parent_id
 * @property int|null $is_child
 * @property int|null $is_wrapper
 * @property int|null $status
 * @property string|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Menus extends \yii\db\ActiveRecord
{

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
        return 'menus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_child', 'is_wrapper', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'link_path', 'order'], 'string', 'max' => 255],
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
            'link_path' => 'Link Path',
            'parent_id' => 'Parent ID',
            'is_child' => 'Is Child',
            'is_wrapper' => 'Is Wrapper',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
