<?php

use yii\db\Migration;

class m170206_022119_user extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%user}}', [
            'uid' => 'int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT \'用户ID\'',
            'username' => 'char(16) NOT NULL COMMENT \'用户名\'',
            'password' => 'char(60) NOT NULL COMMENT \'密码\'',
            'salt' => 'char(32) NOT NULL COMMENT \'密码干扰字符\'',
            'email' => 'char(32) NULL COMMENT \'用户邮箱\'',
            'mobile' => 'char(15) NOT NULL DEFAULT \'\' COMMENT \'用户手机\'',
            'reg_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'注册时间\'',
            'reg_ip' => 'bigint(20) NOT NULL DEFAULT \'0\' COMMENT \'注册IP\'',
            'last_login_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'最后登录时间\'',
            'last_login_ip' => 'bigint(20) NOT NULL DEFAULT \'0\' COMMENT \'最后登录IP\'',
            'update_time' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'tuid' => 'int(8) unsigned NOT NULL DEFAULT \'0\' COMMENT \'推荐人uid\'',
            'image' => 'varchar(255) NOT NULL DEFAULT \'\' COMMENT \'头像路径\'',
            'score' => 'int(8) unsigned NOT NULL DEFAULT \'0\' COMMENT \'当前积分\'',
            'score_all' => 'int(8) unsigned NOT NULL DEFAULT \'0\' COMMENT \'总积分\'',
            'allowance' => 'int(5) NOT NULL COMMENT \'api接口调用速率限制\'',
            'allowance_updated_at' => 'int(10) NOT NULL COMMENT \'api接口调用速率限制\'',
            'status' => 'tinyint(4) NULL DEFAULT \'0\' COMMENT \'用户状态 1正常 0禁用\'',
            'PRIMARY KEY (`uid`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表'");
        
        /* 索引设置 */
        $this->createIndex('username','{{%user}}','username',1);
        $this->createIndex('mobile','{{%user}}','mobile',1);
        $this->createIndex('email','{{%user}}','email',1);
        $this->createIndex('status','{{%user}}','status',0);
        
        
        /* 表数据 */
        //$this->insert('{{%user}}',['uid'=>'6','username'=>'e282486518','password'=>'$2y$13$oO.xRlrKjMMF/bykb7476.zBIH2RkR6rtv8j5jrYgSxi71AvV3lFG','salt'=>'kXGkWeNSeoK7vakqRfUAviocq-5uy0cN','email'=>'phphome@qq.com','mobile'=>'13656568989','reg_time'=>'1456568652','reg_ip'=>'13654444444','last_login_time'=>'1456568652','last_login_ip'=>'13556464888','update_time'=>'1481279978','tuid'=>'7','image'=>'1','score'=>'10','score_all'=>'0','allowance'=>'4','allowance_updated_at'=>'1480328877','status'=>'1']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%user}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

