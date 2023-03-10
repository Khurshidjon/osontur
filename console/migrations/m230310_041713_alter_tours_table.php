<?php

use yii\db\Migration;

/**
 * Class m230310_041713_alter_tours_table
 */
class m230310_041713_alter_tours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `tours` ADD `is_carousel` INT NULL DEFAULT NULL AFTER `content_en`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230310_041713_alter_tours_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230310_041713_alter_tours_table cannot be reverted.\n";

        return false;
    }
    */
}
