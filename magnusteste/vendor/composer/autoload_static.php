<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9943935cab4e0ca0d0bb78a9352a2580
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'magnusbilling\\api\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'magnusbilling\\api\\' => 
        array (
            0 => __DIR__ . '/..' . '/magnussolution/magnusbilling-api/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9943935cab4e0ca0d0bb78a9352a2580::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9943935cab4e0ca0d0bb78a9352a2580::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9943935cab4e0ca0d0bb78a9352a2580::$classMap;

        }, null, ClassLoader::class);
    }
}
