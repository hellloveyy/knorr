<?php

define('IN_HEMA', TRUE);
define('HEMA_ROOT', dirname(__FILE__));
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
date_default_timezone_set('PRC');
header("Content-type:text/html;charset=utf-8");

require_once HEMA_ROOT . '/include/global.func.php';

foreach (array('_COOKIE', '_POST', '_GET') as $_request) {
    foreach ($$_request as $_key => $_value) {
        $_key{0} != '_' && $$_key = daddslashes($_value);
    }
}

require_once HEMA_ROOT . '/include/config.inc.php';
require_once HEMA_ROOT . '/include/db_mysql.class.php';

$datetime = time();

$back_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//var_dump($back_url);
$db = new DBPDO();

include_once HEMA_ROOT . '/templates'.$_SERVER['REQUEST_URI'].'.php';



