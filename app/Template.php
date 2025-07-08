<?php
// app/Template.php
namespace App;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Template
{
    private static ?Environment $twig = null;

    public static function get(): Environment
    {
        if (self::$twig === null) {
            // 1) où sont vos templates ?
            $loader = new FilesystemLoader(__DIR__ . '/View');

            // 2) config
            self::$twig = new Environment($loader, [
                'cache'       => __DIR__ . '/../var/cache', // false en dev
                'auto_reload' => true,
                'debug'       => true,
            ]);

            // 3) globals, extensions...
            self::$twig->addGlobal('session', $_SESSION);
            // if (class_exists(\Twig\Extension\DebugExtension::class)) {
            //     self::$twig->addExtension(new \Twig\Extension\DebugExtension());
            // }
        }

        return self::$twig;
    }
}
