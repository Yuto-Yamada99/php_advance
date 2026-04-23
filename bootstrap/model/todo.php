<?php

// model/Todo.php
require_once 'connect.php';

class Todo
{
    private $pdo;

    public function __construct()
    {
        // Databaseクラスのインスタンスを作り、PDOを取得する
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    // 全件取得
    public function findAll()
    {
        $sql = 'SELECT * FROM tasks ORDER BY created_at;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(); // 全データを配列で返す
    }

    // 新規作成（insert.php 用）
    public function create($title, $content)
    {
        $sql = 'INSERT INTO tasks (title, content, created_at, updated_at) VALUES (:title, :content, NOW(), NOW());';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);

        return $stmt->execute();
    }

    // 削除
    public function delete($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
