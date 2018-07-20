<?php

use yii\db\Migration;

class m170206_022119_article extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%article}}', [
            'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT \'文档ID\'',
            'category_id' => 'int(10) unsigned NOT NULL COMMENT \'所属分类\'',
            'name' => 'char(40) NOT NULL DEFAULT \'\' COMMENT \'标识\'',
            'title' => 'char(80) NOT NULL DEFAULT \'\' COMMENT \'标题\'',
            'cover' => 'int(8) unsigned NULL COMMENT \'封面ID\'',
            'description' => 'char(140) NOT NULL DEFAULT \'\' COMMENT \'描述\'',
            'content' => 'text NOT NULL COMMENT \'内容\'',
            'extend' => 'text NULL COMMENT \'扩展内容array\'',
            'link' => 'varchar(255) NOT NULL DEFAULT \'\' COMMENT \'外链\'',
            'up' => 'int(8) unsigned NOT NULL DEFAULT \'0\' COMMENT \'支持数\'',
            'down' => 'int(8) unsigned NOT NULL DEFAULT \'0\' COMMENT \'反对数\'',
            'view' => 'int(8) unsigned NOT NULL DEFAULT \'0\' COMMENT \'浏览数\'',
            'sort' => 'int(4) NOT NULL DEFAULT \'0\' COMMENT \'排序值\'',
            'create_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'update_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'status' => 'tinyint(1) NOT NULL DEFAULT \'1\' COMMENT \'状态0回收站 1正常\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDb  DEFAULT CHARSET=utf8 COMMENT='文章表'");
        
        /* 索引设置 */
        $this->createIndex('idx_category_status','{{%article}}','category_id, status',0);
        $this->createIndex('idx_status_type_pid','{{%article}}','status',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%article}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

