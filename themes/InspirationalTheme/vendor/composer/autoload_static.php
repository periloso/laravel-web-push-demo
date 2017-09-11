<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee6fe5ddba8995db22ffeecca2f0b221
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Themes\\InspirationalTheme\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Themes\\InspirationalTheme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Themes\\InspirationalTheme\\Console\\ThemeInspirationalCommand' => __DIR__ . '/../..' . '/Console/ThemeInspirationalCommand.php',
        'Themes\\InspirationalTheme\\Database\\Seeders\\InspirationalThemeDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/InspirationalThemeDatabaseSeeder.php',
        'Themes\\InspirationalTheme\\Http\\Controllers\\InspirationalThemeController' => __DIR__ . '/../..' . '/Http/Controllers/InspirationalThemeController.php',
        'Themes\\InspirationalTheme\\Providers\\InspirationalThemeServiceProvider' => __DIR__ . '/../..' . '/Providers/InspirationalThemeServiceProvider.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee6fe5ddba8995db22ffeecca2f0b221::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee6fe5ddba8995db22ffeecca2f0b221::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitee6fe5ddba8995db22ffeecca2f0b221::$classMap;

        }, null, ClassLoader::class);
    }
}