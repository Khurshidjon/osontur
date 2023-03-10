<?php

use yii\db\Migration;

/**
 * Class m230310_050311_alter_tours_table
 */
class m230310_050311_alter_tours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `tours` ADD `description_uz` TEXT NULL DEFAULT NULL AFTER `title_en`, ADD `description_ru` TEXT NULL DEFAULT NULL AFTER `description_uz`, ADD `description_en` TEXT NULL DEFAULT NULL AFTER `description_ru`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230310_050311_alter_tours_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230310_050311_alter_tours_table cannot be reverted.\n";

        return false;
    }
    */
}
