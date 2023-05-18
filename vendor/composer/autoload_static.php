<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9f84aa146ca61d6c0e049ca40180efc
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Mvc\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9f84aa146ca61d6c0e049ca40180efc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9f84aa146ca61d6c0e049ca40180efc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb9f84aa146ca61d6c0e049ca40180efc::$classMap;

        }, null, ClassLoader::class);
    }
}
