<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'task_list');
define('DB_USER', 'root');
define('DB_PASS', '');

class Database
{
    private $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
        try {
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            exit('ただいま障害によりサービスが利用できません。');
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }
}

// 最後に、この道具箱を使い始める準備（インスタンス化）をする
$db = new Database();
