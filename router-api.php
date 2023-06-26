<?php
define('URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
require_once "route.php";
require_once "api_controller/tareas.api.controller.php";

$route = new Router();
$route->addRoute("pc","GET","tareasApiController","getPc"); //Corregir detalles pero funcionalidad esta --2
$route->addRoute("pc/ordenadas","GET","tareasApiController","getPcByOrder"); //Hacer --3--9
$route->addRoute("pc/filtro","GET","tareasApiController","getPcFilter"); //Hacer --8
$route->addRoute("pc/:ID","GET","tareasApiController","getPc"); //Corregir detalles pero funcionalidad esta -- 4
$route->addRoute("pc/:ID","DELETE","apiController","deletePc"); //Hacer 
$route->addRoute("pc","POST","tareasApiController","postPC"); //5
$route->addRoute("pc/:ID","PUT","tareasApiController","putPc"); //5

$url = $_REQUEST['recurso'];
$verbo= $_SERVER['REQUEST_METHOD'];

$route->route($url, $verbo);



