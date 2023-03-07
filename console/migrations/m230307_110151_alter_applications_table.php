<?php

use yii\db\Migration;

/**
 * Class m230307_110151_alter_applications_table
 */
class m230307_110151_alter_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `applications` ADD `message` TEXT NULL DEFAULT NULL AFTER `phone_number`, ADD `email` VARCHAR(255) NULL DEFAULT NULL AFTER `message`, ADD `answer_from_phone` INT NULL DEFAULT NULL AFTER `email`, ADD `answer_from_email` INT NULL DEFAULT NULL AFTER `answer_from_phone`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230307_110151_alter_applications_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230307_110151_alter_applications_table cannot be reverted.\n";

        return false;
    }
    */
}
