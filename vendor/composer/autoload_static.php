<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4b62c54d5b7e7d3829354737352380e
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'InfosUtilisateur\\InfosUtilisateur\\' => 34,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'InfosUtilisateur\\InfosUtilisateur\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite4b62c54d5b7e7d3829354737352380e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite4b62c54d5b7e7d3829354737352380e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite4b62c54d5b7e7d3829354737352380e::$classMap;

        }, null, ClassLoader::class);
    }
}