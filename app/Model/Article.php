<?php

namespace App\Model;
use PDO;

class Article
{
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($title, $content) {
        $stmt = $this->pdo->prepare('INSERT INTO post (title, content, image) VALUES (?, ?, ?)');
        return $stmt->execute([$title, $content, 'image.png']);
    }

}