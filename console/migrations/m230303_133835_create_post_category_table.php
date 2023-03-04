<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_category}}`.
 */
class m230303_133835_create_post_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_category}}', [
            'id' => $this->primaryKey(),

            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),

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
        $this->dropTable('{{%post_category}}');
    }
}
