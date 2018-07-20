<?php

use yii\db\Migration;

class m170206_022119_picture extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%picture}}', [
            'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT \'主键id自增\'',
            'path' => 'varchar(255) NOT NULL DEFAULT \'\' COMMENT \'路径\'',
            'md5' => 'char(32) NOT NULL DEFAULT \'\' COMMENT \'文件md5\'',
            'create_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'status' => 'tinyint(2) NOT NULL DEFAULT \'0\' COMMENT \'状态\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDb  DEFAULT CHARSET=utf8");
        
        /* 索引设置 */
        $this->createIndex('md5','{{%picture}}','md5',0);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%picture}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

