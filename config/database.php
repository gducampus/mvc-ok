<?php
define('DB_HOST', 'sql.freedb.tech');
define('DB_NAME', 'freedb_mvc_database');
define('DB_USER', 'freedb_mvc_user');
define('DB_PASS', 'zKApR!%4rPNtMU#');

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>