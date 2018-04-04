<?php

use yii\db\Migration;

/**
 * Class m180404_074552_newtableTest2
 */
class m180404_074552_newtableTest2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'newtable_test2',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull(),
                'content' => $this->text()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180404_074552_newtableTest2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180404_074552_newtableTest2 cannot be reverted.\n";

        return false;
    }
    */
}
