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
            $image = $this->uploadImage();
            $this->article->create($title, $content, $image);
            header('Location: /admin/view-actu-all');
        } else {
            include_once __DIR__ . '/../View/admin/actu/create.php';
        }

    }
    public function editActu($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $this->uploadImage();
            $this->article->update($id, $title, $content, $image);
            header('Location: /admin/view-actu-all');
        } else {
            $article = $this->article->getById($id);
            include_once __DIR__ . '/../View/admin/actu/edit.php';
        }


    }
    public function delete($id)
    {
        if ($id == 7) {
            throw new \InvalidArgumentException('Vous ne pouvez pas supprimer ce commentaire');
            header('Location: /admin/view-actu-all');
        }
        $this->article->delete($id);
        header('Location: /admin/view-actu-all');
    }



    public function viewActu()
    {
        $articles = $this->article->getAll();
        include_once __DIR__ . '/../View/admin/actu/viewAll.php';
    }

    private function uploadImage() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../public/uploads/';
            $fileName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                return $fileName;
            }
        }
        return null;
    }
}