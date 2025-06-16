<?php

namespace App\Controller;
use App\Model\Article;
use PDO;

class AdminController
{
    private $article;

    public function __construct() {
        global $pdo;
        $this->article= new Article($pdo);
    }

    public function createActu()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->article->create($title, $content);
            header('Location: /');
        } else {
            include_once __DIR__ . '/../View/admin/actu/create.php';
        }

    }
    public function editActu()
    {
        include_once __DIR__ . '/../View/admin/actu/edit.php';
    }

    public function viewActu()
    {
        include_once __DIR__ . '/../View/admin/actu/viewAll.php';
    }
}