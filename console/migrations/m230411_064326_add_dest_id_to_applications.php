<?php

use yii\db\Migration;

/**
 * Class m230411_064326_add_dest_id_to_applications
 */
class m230411_064326_add_dest_id_to_applications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `telegram_user` ADD `temp_destination_id` INT NULL DEFAULT NULL AFTER `step`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230411_064326_add_dest_id_to_applications cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230411_064326_add_dest_id_to_applications cannot be reverted.\n";

        return false;
    }
    */
}
