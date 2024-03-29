<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb1daf8be0bf87f6b2d1302f74723896
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb1daf8be0bf87f6b2d1302f74723896::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb1daf8be0bf87f6b2d1302f74723896::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb1daf8be0bf87f6b2d1302f74723896::$classMap;

        }, null, ClassLoader::class);
    }
}
