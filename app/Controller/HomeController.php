<?php
namespace App\Controller;
class HomeController
{
    public function index()
    {
        include_once __DIR__ . '/../View/home.php';
    }

    public function contact()
    {
        include_once __DIR__ . '/../View/contact.php';
    }

    public function actualites()
    {
        include_once __DIR__ . '/../View/actualites.php';
    }

    public function booking()
    {
        include_once __DIR__ . '/../View/booking.php';
    }






}