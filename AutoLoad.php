<?php

class AutoLoad
{
    private static $_instance = null;

    private function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    public static function _instance()
    {
        if (!self::$_instance) {
            self::$_instance = new AutoLoad();
        }
        return self::$_instance;
    }

    public function load($class)
    {
        if (
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class') . $class . '.php')            ||
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class/Base') . $class . '.php')       ||
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class/Menu') . $class . '.php')       ||
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class/Metabox') . $class . '.php')    ||
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class/Setting') . $class . '.php')    ||
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class/Widget') . $class . '.php')     ||
            is_readable(trailingslashit(OOP_PLUGIN_DIR . 'class/PostType') . $class . '.php')
        ) {
            if (file_exists(trailingslashit(OOP_PLUGIN_DIR . 'class') . $class . '.php')) {

                include_once trailingslashit(OOP_PLUGIN_DIR . 'class') . $class . '.php';

            } elseif (file_exists(trailingslashit(OOP_PLUGIN_DIR . 'class/Base') . $class . '.php')){

                include_once trailingslashit(OOP_PLUGIN_DIR . 'class/Base') . $class . '.php';

            } elseif (file_exists(trailingslashit(OOP_PLUGIN_DIR . 'class/Menu') . $class . '.php'))
            {
                include_once trailingslashit(OOP_PLUGIN_DIR . 'class/Menu') . $class . '.php';

            }elseif (file_exists(trailingslashit(OOP_PLUGIN_DIR . 'class/Metabox') . $class . '.php'))
            {
                include_once trailingslashit(OOP_PLUGIN_DIR . 'class/Metabox') . $class . '.php';

            }elseif (file_exists(trailingslashit(OOP_PLUGIN_DIR . 'class/Widget') . $class . '.php'))
            {
                include_once trailingslashit(OOP_PLUGIN_DIR . 'class/Widget') . $class . '.php';

            }elseif (file_exists(trailingslashit(OOP_PLUGIN_DIR . 'class/PostType') . $class . '.php'))
            {
                include_once trailingslashit(OOP_PLUGIN_DIR . 'class/PostType') . $class . '.php';
            }
        }
        return;
    }
}

AutoLoad::_instance();