<?php

if (DEV_MODE) {
    $config['default']['db_driver'] = 'mysql';
    $config['default']['db_host'] = 'localhost';
    $config['default']['db_user'] = 'root';
    $config['default']['db_password'] = 'root02';
    $config['default']['db_name'] = 'BD02';
}
else
{
    $config['default']['db_driver'] = 'mysql';
    $config['default']['db_host'] = 'localhost';
    $config['default']['db_user'] = 'grup2';
    $config['default']['db_password'] = 'dJsnEARoL';
    $config['default']['db_name'] = 'grup2_1112';
}
?>