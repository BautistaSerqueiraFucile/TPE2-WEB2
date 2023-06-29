<?php
define('URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
require_once "route.php";
require_once "api_controller/pc.api.controller.php";


$route = new Router();
$route->addRoute("token","GET", "userController", "cargarToken"); //Generacion de token
$route->addRoute("pc", "GET", "pcApiController", "getPc"); //2
$route->addRoute("pc/ordenadas", "GET", "pcApiController", "getPcByOrder"); //3--9
$route->addRoute("pc/filtro", "GET", "pcApiController", "getPcFilter"); //8
$route->addRoute("pc/:ID", "GET", "pcApiController", "getPc"); //4
$route->addRoute("pc/:ID", "DELETE", "pcApiController", "deletePc"); //Hacer 
$route->addRoute("pc", "POST", "pcApiController", "postPC"); //5
$route->addRoute("pc/:ID", "PUT", "pcApiController", "putPc"); //5
$route->addRoute("pc", "GET", "pcApiController", "getPaginado");

$url = $_REQUEST['recurso'];
$verbo = $_SERVER['REQUEST_METHOD'];

$route->route($url, $verbo);

