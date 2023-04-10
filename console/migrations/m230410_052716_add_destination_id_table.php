<?php

use yii\db\Migration;

/**
 * Class m230410_052716_add_destination_id_table
 */
class m230410_052716_add_destination_id_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `applications` ADD `destination_id` INT NULL DEFAULT NULL AFTER `answer_from_email`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230410_052716_add_destination_id_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230410_052716_add_destination_id_table cannot be reverted.\n";

        return false;
    }
    */
}
