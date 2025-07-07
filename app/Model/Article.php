<?php

namespace App\Model;
use PDO;

class Article
{
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($title, $content, $image) {
        $stmt = $this->pdo->prepare('INSERT INTO post (title, content, image) VALUES (?, ?, ?)');
        return $stmt->execute([$title, $content, $image]);
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM post');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM post WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content, $image) {
        $stmt = $this->pdo->prepare('UPDATE blog SET title = ?, content = ?, image = ? WHERE id = ?');
        return $stmt->execute([$title, $content, $image, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM post WHERE id = ?');
        return $stmt->execute([$id]);
    }

}