<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit78aa757dcb87398a3c7904d66c6c7a82
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit78aa757dcb87398a3c7904d66c6c7a82::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit78aa757dcb87398a3c7904d66c6c7a82::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit78aa757dcb87398a3c7904d66c6c7a82::$classMap;

        }, null, ClassLoader::class);
    }
}