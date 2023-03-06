<?php

use yii\db\Migration;

/**
 * Class m230306_043140_alter_posts_table
 */
class m230306_043140_alter_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `posts` ADD `image` VARCHAR(255) NULL DEFAULT NULL AFTER `content_en`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230306_043140_alter_posts_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_043140_alter_posts_table cannot be reverted.\n";

        return false;
    }
    */
}
