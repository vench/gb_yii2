<?php

use yii\db\Migration;

/**
 * Class m181211_183455_first
 */
class m181211_183455_first extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id_activity' => $this->primaryKey(),
            'activity_name' => $this->string(255)->notNull(),
            'activity_start_timestamp' => $this->timestamp()->defaultExpression("now()"),
            'activity_end_timestamp' => $this->timestamp()->defaultExpression("now()"),
            'id_user' => $this->integer(),
            'body' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181211_183455_first cannot be reverted.\n";

        $this->dropTable('activity');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181211_183455_first cannot be reverted.\n";

        return false;
    }
    */
}
