<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menus}}`.
 */
class m230303_121956_create_menus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menus}}', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),

            'link_path' => $this->string(),
            'parent_id' => $this->integer(),
            'is_child' => $this->integer(),
            'is_wrapper' => $this->integer(),
            'status' => $this->integer(),
            'order' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menus}}');
    }
}
