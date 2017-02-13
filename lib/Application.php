<?php

class Application
{
    /**
     * @var bool
     */
    public static $loaded = false;

    /**
     * @var array
     */
    private static $includePaths = array();

    public static function load()
    {
        if(!self::$loaded) {
            // build core definitions
            define('BASE_PATH', self::basePath());

            // set the include paths
            self::addIncludePath('');
            self::addIncludePath('/lib');
            self::setIncludePaths();

            // setup the autoloader
            spl_autoload_register(array('\Application', 'autoload'));

            // tell the application that the environment has loaded
            self::$loaded = true;
        }
    }

    /**
     * @return string
     */
    public static function basePath()
    {
        return dirname(dirname(__FILE__));
    }

    /**
     * @param string $className
     * @return bool
     */
    public static function autoload(string $className)
    {
        $libPath = BASE_PATH . '/lib/';
        $className = str_replace('\\', '/', $className);
        // first check to see if the classname is a file
        if(is_file($libPath . $className . '.php')) {
            require_once($libPath . $className . '.php');
            return true;
        } else {
            $path = join('/', explode('_', $className)) . '.php';
            if(is_file($libPath . $path)) {
                require_once($libPath . $path);
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $path
     */
    public static function addIncludePath(string $path)
    {
        self::$includePaths[] = $path;
    }

    public static function setIncludePaths()
    {
        $includes = array();
        $paths = self::$includePaths;
        foreach($paths as $path) {
            $includes[] = BASE_PATH . $path;
        }
        $includes = implode(PATH_SEPARATOR, $includes);
        set_include_path($includes . PATH_SEPARATOR . get_include_path());
    }
}