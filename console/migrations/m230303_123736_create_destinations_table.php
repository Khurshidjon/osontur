<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%destinations}}`.
 */
class m230303_123736_create_destinations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%destinations}}', [
            'id' => $this->primaryKey(),

            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),

            'wallpaper' => $this->string(),

            'is_banner' => $this->integer(),

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
        $this->dropTable('{{%destinations}}');
    }
}
