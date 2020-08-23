<?php

use yii\db\Migration;

/**
 * Class m180122_124433_users
 */
class m180122_124433_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {
        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180122_124433_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180122_124433_users cannot be reverted.\n";

        return false;
    }
    */
}
