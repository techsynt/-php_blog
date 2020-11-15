<?php
//frontcontroller

// general settings

ini_set('display_errors', 1);
error_reporting(E_ALL);

// connecting system files

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Router.php');

// connecting DB
require_once(ROOT.'/components/Autoload.php');

// bd connection 
require_once(ROOT.'/components/db.php');
//Router call

$router = new Router();
$router->run();

