<?php

namespace App\Controller;
use App\Model\Article;
use PDO;
use App\Template;

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
            if (($_SESSION['user']['is_admin']) != 1) {
                header('Location: /login');
                exit;
            }
            echo Template::get()->render('admin/actu/create.html.twig', [
                // you can pass default form values, errors, whatever:
                'title'   => '',
                'content' => '',
                'user'    => $_SESSION['user'],
            ]);
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
            if (($_SESSION['user']['is_admin']) != 1) {
                header('Location: /login');
                exit;
            }
            $article = $this->article->getById($id);
            include_once __DIR__ . '/../View/admin/actu/edit.php';
        }


    }
    public function delete($id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $this->article->delete($id);
        header('Location: /admin/view-actu-all');
    }



    public function viewActu()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $articles = $this->article->getAll();
        echo Template::get()->render('admin/actu/index.html.twig', [
            'articles' => $articles,
        ]);
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