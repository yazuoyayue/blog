<?php

use yii\db\Migration;

class m170206_022119_article_cat extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%article_cat}}', [
            'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT \'分类ID\'',
            'pid' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'上级分类ID\'',
            'name' => 'varchar(30) NOT NULL COMMENT \'标志\'',
            'title' => 'varchar(50) NOT NULL COMMENT \'标题\'',
            'link' => 'varchar(250) NULL DEFAULT \'\' COMMENT \'外链\'',
            'extend' => 'text NULL COMMENT \'扩展设置\'',
            'meta_title' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'SEO的网页标题\'',
            'keywords' => 'varchar(255) NULL DEFAULT \'\' COMMENT \'关键字\'',
            'description' => 'varchar(255) NULL DEFAULT \'\' COMMENT \'描述\'',
            'create_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'update_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'sort' => 'int(10) NOT NULL DEFAULT \'0\' COMMENT \'排序（同级有效）\'',
            'status' => 'tinyint(1) NOT NULL DEFAULT \'1\' COMMENT \'数据状态\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDb  DEFAULT CHARSET=utf8 COMMENT='分类表'");
        
        /* 索引设置 */
        $this->createIndex('uk_name','{{%article_cat}}','name',1);
        $this->createIndex('pid','{{%article_cat}}','pid',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%article_cat}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

