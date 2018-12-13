<?php

use yii\db\Migration;

/**
 * Class m181213_182321_user
 */
class m181213_182321_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("user", [
            "id" => $this->primaryKey(),
            "username" =>$this->string()->notNull()->unique(),
            "auth_key" => $this->string(32)->notNull(),
            "password_hash" => $this->string()->notNull(),
            "password_reset_token" => $this->string()->unique(),
            "email" => $this->string()->notNull()->unique(),
            "created_at" => $this->timestamp()->defaultExpression("now()")->notNull(),
            "updated_at" => $this->timestamp()->defaultExpression("now()")->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181213_182321_user cannot be reverted.\n";

        return false;
    }
    */
}
