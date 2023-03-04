<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tags}}`.
 */
class m230303_134212_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags}}', [
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
        $this->dropTable('{{%tags}}');
    }
}
