<?php
define('SMARTY_DIR', '../Smarty-3.1.18/libs/');
define('SITE_NAME', "Anemia");
define('DEBUG', "1");
define('ADMIN_CODE', "anemia2017");
define('ADMIN_EMAIL', "sanzhar73@gmail.com");
define('READ_MODE', "1"); //режим только на чтение


include_once 'includes/class_dao.php';
require_once(SMARTY_DIR . 'Smarty.class.php');
include_once 'includes/class_dictionary.php';
include_once 'includes/class_user.php';
include_once 'includes/class_navigate.php';
include_once 'includes/class_EntityEditAbstr.php';
include_once 'includes/class_global.php';
include_once 'includes/functions.php';

$smarty = new Smarty();
$smarty->assign('application_name',SITE_NAME);
//$smarty->force_compile = true;
$dao = new Dao();
//$globalObject = new GlobalObject();
//$globalObject->smarty = $smarty;
//$globalObject->dao = $dao;


ini_set("display_errors",1);
error_reporting(E_ALL);

?>