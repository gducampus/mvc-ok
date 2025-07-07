<?php

namespace App\Model;
use PDO;
class User
{
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function create(string $email, string $password): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        return $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function exists(string $email): bool
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function login(string $email, string $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}