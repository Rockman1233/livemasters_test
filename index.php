<?php
include_once 'vendor/autoload.php';
ini_set('display_errors', 0);
error_reporting(E_ALL);
//session_start();
include_once 'components/route.php';
//put here the directory with index.php (form from ROOT: cat1/ca2/ )
$GLOBALS['base_dir'] = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];

$router = new Route();
$router->start();

