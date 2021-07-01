<?php 
namespace App;


class Autoload
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        /**
         * Replace start namespace name `App`
         */
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        /**
         * Replace `\` by `/`
         */
        $class = str_replace('\\', '/', $class);

        /**
         * Valide if file exist above require
         */
        $file = __DIR__ . '/' . $class . '.php';
        if(file_exists($file)){
            require_once $file; 
        }
    }
}