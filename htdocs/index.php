<?php

include_once('../configure/general.config.php');

include_once(PATH_ENGINE . 'config.class.php');
include_once(PATH_ENGINE . 'view.class.php');
include_once(PATH_ENGINE . 'controller.class.php');
include_once(PATH_ENGINE . 'database.class.php');
include_once(PATH_ENGINE . 'model.class.php');
include_once(PATH_ENGINE . 'url.class.php');
include_once(PATH_ENGINE . 'dispatcher.class.php');
include_once(PATH_ENGINE . 'filter.class.php');

error_reporting(E_ALL & E_NOTICE);

$dispatcher = new Dispatcher();

?>