<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
//session_start(); //для авторизашки

include_once($_SERVER['DOCUMENT_ROOT'].'/components/route.php');

$router = new Route();
$router->start();

