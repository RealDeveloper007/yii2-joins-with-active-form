<?php

use yii\db\Migration;

/**
 * Class m180122_125110_users
 */
class m180122_125110_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180122_125110_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180122_125110_users cannot be reverted.\n";

        return false;
    }
    */
}
