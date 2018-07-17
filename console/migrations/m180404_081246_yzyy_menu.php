<?php

use yii\db\Migration;

/**
 * Class m180404_081246_yzyy_menu
 */
class m180404_081246_yzyy_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'yzyy_menu',
            [
                'id' => $this->primaryKey(), #主键自增id
                'name' => $this->string()->notNull(), #菜单名
                'link' => $this->string(), #链接
                'status' => $this->integer(), #状态 0：不显示 1显示
                'parent_id' => $this->integer(), #所属父类，多余的字段
                'sort' => $this->integer(), #排序，多余的字段
                'left' => $this->integer(), #左值
                'right' => $this->integer(), #右值
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180404_081246_yzyy_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180404_081246_yzyy_menu cannot be reverted.\n";

        return false;
    }
    */
}
