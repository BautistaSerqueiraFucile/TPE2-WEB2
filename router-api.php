<?php
define('URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
require_once "route.php";
require_once "api_controller/pc.api.controller.php";
require_once "api_controller/user.api.controller.php";


$route = new Router();
$route->addRoute("token","GET", "userController", "cargarToken");
$route->addRoute("pc", "GET", "pcApiController", "getPc");
$route->addRoute("pc/ordenadas", "GET", "pcApiController", "getPcByOrder");
$route->addRoute("pc/filtro", "GET", "pcApiController", "getPcFilter");
$route->addRoute("pc/:ID", "GET", "pcApiController", "getPc");
$route->addRoute("pc", "POST", "pcApiController", "postPC");
$route->addRoute("pc/:ID", "PUT", "pcApiController", "putPc");


$url = $_REQUEST['recurso'];
$verbo = $_SERVER['REQUEST_METHOD'];

$route->route($url, $verbo);

