<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaec78343e349d4c52c2f51ed057c9130
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaec78343e349d4c52c2f51ed057c9130::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaec78343e349d4c52c2f51ed057c9130::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaec78343e349d4c52c2f51ed057c9130::$classMap;

        }, null, ClassLoader::class);
    }
}