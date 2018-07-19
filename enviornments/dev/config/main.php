<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 10:27
 */
#$mysql_db = '127.0.0.1';
#$mysql_db_master = 'gxptest';
#$passwd = '';

$mysql_db = '118.25.91.182'; #mysql-db
$mysql_db_master = 'gxptest';
$passwd = '123456';

return [
    'components' => [
        'db' => [
            'dsn' => "mysql:host=$mysql_db;dbname=$mysql_db_master",
            'username' => 'root',
            'password' => $passwd,
            'charset' => 'utf8'
        ]
    ]
];