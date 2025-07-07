<?php

namespace App\Controller;
use App\Model\User;
use PDO;

class AuthController
{
    private $user;

    public function __construct() {
        global $pdo;
        $this->user= new User($pdo);
    }

    public function register()
    {
        $errors = [];
        $old = ['email' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email']);
            $password = $_POST['password'];
            $old['email'] = htmlspecialchars($email, ENT_QUOTES);

            // 1) Vérifier que l'email n'existe pas
            if ($this->user->exists($email)) {
                $errors[] = "Cet email est déjà utilisé.";
            }

            // 2) Vérifier la robustesse du mot de passe
            if (strlen($password) < 8
                || !preg_match('/[A-Za-z]/', $password)
                || !preg_match('/\d/', $password)
            ) {
                $errors[] = "Le mot de passe doit faire au moins 8 caractères et contenir au moins une lettre et un chiffre.";
            }

            if (empty($errors)) {
                $this->user->create($email, $password);
                header('Location: /login');
                exit;
            }
        }

        include_once __DIR__ . '/../View/auth/register.php';
    }

    public function login()
    {
        $error = '';
        $old   = ['email' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email']);
            $password = $_POST['password'];
            $old['email'] = htmlspecialchars($email, ENT_QUOTES);

            $user = $this->user->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /admin/view-actu-all');
                exit;
            } else {
                $error = "Identifiants invalides.";
            }
        }

        include_once __DIR__ . '/../View/auth/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }


}