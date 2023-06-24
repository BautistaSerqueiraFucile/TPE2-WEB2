<?php
define('URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
require_once "route.php";
require_once "api_controller/api.controller.php";

$route = new Router();

$route->addRoute("pc","GET","apiController","getPc");
$route->addRoute("pc/:ID","GET","apiController","getPc");
$route->addRoute("pc/:ID","DELETE","apiController","deletePc");
$route->addRoute("pc/","PUT","apiController","createPc");
$route->addRoute("pc/:ID","POST","apiController","modifiePc");

$url = $_GET['recurso'];
$verbo= $_SERVER['REQUEST_METHOD'];
$route->route($url, $verbo);



