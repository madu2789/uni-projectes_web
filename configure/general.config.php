<?php

//Variable desarrollo
if (strpos($_SERVER['HTTP_HOST'], '.local') !== false) {
    define('DEV_MODE', true);
    define('URL_ABSOLUTE', 'http://grup2.local/');
    define('SQL_DEBUG', true);
}
else
{
    define('DEV_MODE', false);
    define('URL_ABSOLUTE', 'http://g2.production/');
    define('SQL_DEBUG', false);
}

define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define('INSTANCE_PATH', PATH_ROOT . '../');
define('PATH_ENGINE', PATH_ROOT . '../../../engine/');
define('PATH_CONFIGURE', INSTANCE_PATH . 'configure/');
define('PATH_SMARTY', PATH_ENGINE . 'smarty/');
define('PATH_CONTROLLERS', INSTANCE_PATH . 'controllers/');
define('PATH_MODELS', INSTANCE_PATH . 'models/');
define('PATH_TEMPLATES', INSTANCE_PATH . 'templates/');
define('PATH_TEMPLATES_C', INSTANCE_PATH . 'templates_c/');

?>