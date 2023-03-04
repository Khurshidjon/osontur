<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m230303_133847_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),

            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),

            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),

            'category_id' => $this->integer(),

            'tags' => $this->string(),

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
        $this->dropTable('{{%posts}}');
    }
}
