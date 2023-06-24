<?php
define('URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
require_once "route.php";
require_once "api_controller/api.controller.php";

$route = new Router();
if (isset($_REQUEST['sort'], $_REQUEST['order'])) {
    $sort=$_REQUEST['sort'];
    $order= $_REQUEST['order'];
}
else{
    $sort="";
    $order="";
}
$route->addRoute("pc","GET","apiController","getPc"); //Corregir detalles pero funcionalidad esta --2
$route->addRoute("pc/:ID","GET","apiController","getPc"); //Corregir detalles pero funcionalidad esta -- 4
$route->addRoute("pc/ordenado","GET","apiController","getPcByOrder"); //Hacer --3
$route->addRoute("pc/orden?sort=".$sort."&order=".$order,"GET","apiController","getPcByOrder"); // --9
// $route->addRoute("pc/:ID","DELETE","apiController","deletePc"); //Hacer 
$route->addRoute("pc","PUT","apiController","createPc"); //Hacer --5
$route->addRoute("pc/:ID","POST","apiController","modifiePc"); //Hacer --5

$url = $_GET['recurso'];
$verbo= $_SERVER['REQUEST_METHOD'];
$route->route($url, $verbo);



