<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb5c5249e8bb8be66fb5894dc2c449c1a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb5c5249e8bb8be66fb5894dc2c449c1a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb5c5249e8bb8be66fb5894dc2c449c1a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb5c5249e8bb8be66fb5894dc2c449c1a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
