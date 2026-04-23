<?php

// データベース接続用クラス
// $pdo = new PDO('mysql:host=localhost;dbname=task_list;charset=utf8', 'root', '');
class Database
{
    private $host = 'localhost';
    private $dbname = 'task_list';
    private $user = 'root';
    private $pass = '';
    private $pdo;

    // インスタンス（実体）を作った瞬間に自動で接続する
    public function __construct()
    {
        // data source name
        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8';
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            exit('ただいま障害によりサービスが利用できません。');
        }
    }

    // 接続したPDOを外に渡すためのメソッド
    public function getPdo()
    {
        return $this->pdo;
    }
}
