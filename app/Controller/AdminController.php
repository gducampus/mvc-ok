<?php

namespace App\Controller;

class AdminController
{

    public function createActu()
    {
        include_once __DIR__ . '/../View/admin/actu/create.php';
    }
    public function editActu()
    {
        include_once __DIR__ . '/../View/admin/actu/edit.php';
    }
}