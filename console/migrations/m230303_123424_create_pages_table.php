<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m230303_123424_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),

            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),

            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
