<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once './../config/database.php';
require_once __DIR__ . '/../app/Template.php';
use App\Controller\HomeController;
use App\Controller\AdminController;
use App\Controller\AuthController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', trim($uri, '/'));


$controller = new HomeController();
$adminController = new AdminController();
$authController = new AuthController();

switch ($uriSegments[0]) {
    case '':
        $controller->index();
        break;
    case 'contact':
        $controller->contact();
        break;
    case 'actus':
        $controller->actualites();
        break;
    case 'booking':
        $controller->booking();
        break;
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;


    case 'admin':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'create-actu':
                    $adminController->createActu();
                    break;
                case 'edit-actu':
                    if (isset($uriSegments[2])) {
                        $adminController->editActu($uriSegments[2]);
                    }

                    break;
                case 'view-actu-all':
                    $adminController->viewActu();
                    break;

                case 'delete':
                    if (isset($uriSegments[2])) {
                        $adminController->delete($uriSegments[2]);
                    }
                    break;
            }
        }
        break;
}




