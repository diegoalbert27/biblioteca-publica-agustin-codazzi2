<?php

//Configuración global
require_once 'config/realpath.php';
 
//Base para los controladores
require_once CORE_PATH . '/controller_base.php';
 
//Funciones para el controlador frontal
require_once CORE_PATH . '/function_control.php';

session_start();

//Cargamos controladores y acciones
if (isset($_SESSION['user_id'])) {
    if (isset($_GET["controller"])) {
        $controllerObj = cargarControlador($_GET["controller"]);
        lanzarAccion($controllerObj);
    } else {
        $controllerObj = cargarControlador('inicio');
        lanzarAccion($controllerObj);
    }
} else {
    if (isset($_GET["controller"]) && $_GET["controller"] === 'session') {
        $controllerObj = cargarControlador('session');
        lanzarAccion($controllerObj);
    } else if (isset($_GET["controller"]) && $_GET["controller"] === 'client') {
        $controllerObj = cargarControlador($_GET["controller"]);
        lanzarAccion($controllerObj);
    } else {
        $controllerObj = cargarControlador('home');
        lanzarAccion($controllerObj);
    }
}