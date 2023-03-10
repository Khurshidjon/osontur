<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_user}}`.
 */
class m230305_100749_create_telegram_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_user}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(),
            'nickname' => $this->string(),
            'username' => $this->string(),
            'telegram_id' => $this->string(),
            'user_id' => $this->string(),
            'language' => $this->string(),
            'phone_number' => $this->string(),
            'step' => $this->integer()->defaultValue(1),
            'role' => $this->integer()->defaultValue(1)->comment("1 - user, 2 - admin"),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_user}}');
    }
}
