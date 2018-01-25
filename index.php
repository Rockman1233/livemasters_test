<?php
include_once 'vendor/autoload.php';
ini_set('display_errors', 0);
error_reporting(E_ALL);
//session_start(); //для авторизашки
include_once 'components/route.php';
//укажите путь до каталога с index.php (формат от ROOT: каталог1/каталог2/ )
$GLOBALS['base_dir'] = 'livemasters/';
$router = new Route();
$router->start();

