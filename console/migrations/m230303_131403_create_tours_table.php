<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tours}}`.
 */
class m230303_131403_create_tours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tours}}', [
            'id' => $this->primaryKey(),

            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),

            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),

            'wallpaper' => $this->string(),
            'price' => $this->string(),
            'days' => $this->integer(),

            'destination_id' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tours}}');
    }
}
