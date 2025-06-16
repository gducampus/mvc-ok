<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once './../config/database.php';
use App\Controller\HomeController;
use App\Controller\AdminController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', trim($uri, '/'));


$controller = new HomeController();
$adminController = new AdminController();

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
    case 'admin':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'create-actu':
                    $adminController->createActu();
                    break;
                case 'edit-actu':
                    $adminController->editActu();
                    break;
                case 'view-actu-all':
                    $adminController->viewActu();
                    break;
            }
        }
        break;
}




