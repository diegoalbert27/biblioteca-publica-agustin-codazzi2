<?php

function cargarControlador ($controlador) {
    $controlador = 'controller' . ucwords($controlador);
    $strFileController = 'controllers/' . $controlador . '.php';

    require_once $strFileController;
    $controladorObj = new $controlador;
    return $controladorObj;
}

function cargarAccion ($controladorObj, $action) {
    $accion = $action;
    $controladorObj->$accion();
}

function lanzarAccion($controllerObj) {   
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAccion($controllerObj, $_GET["action"]);
    } else {
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}