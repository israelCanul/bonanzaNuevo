<?php
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
*/

error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
date_default_timezone_set("America/Mexico_City");
// change the following paths if necessary
$yii=dirname(__FILE__).'/lib/yii/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

?>
