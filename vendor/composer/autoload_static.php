<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc03479beb735a557fa53ddea939dea19
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc03479beb735a557fa53ddea939dea19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc03479beb735a557fa53ddea939dea19::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
