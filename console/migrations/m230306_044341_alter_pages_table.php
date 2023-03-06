<?php

use yii\db\Migration;

/**
 * Class m230306_044341_alter_pages_table
 */
class m230306_044341_alter_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `pages` ADD `image` VARCHAR(255) NULL DEFAULT NULL AFTER `content_en`, ADD `menu_id` INT NULL DEFAULT NULL AFTER `image`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230306_044341_alter_pages_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_044341_alter_pages_table cannot be reverted.\n";

        return false;
    }
    */
}
