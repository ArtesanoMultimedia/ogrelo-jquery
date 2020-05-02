<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL

function cargarControlador($controller)
{
    $controlador = ucwords($controller) . 'Controller';
    $strFileController = 'app/Controllers/' . $controlador . '.php';

    if (!is_file($strFileController)) {
        $strFileController = 'app/Controllers/' . ucwords(DEFAULT_CONTROLLER) . 'Controller.php';
    }

    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}

function cargarAccion($controllerObj, $action)
{
    $accion = $action;
    $controllerObj->$accion();
}

function lanzarAccion($controllerObj)
{
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAccion($controllerObj, $_GET["action"]);
    } else {
        cargarAccion($controllerObj, DEFAULT_ACTION);
    }
}

function to($input) {
    [$controlador, $accion] = explode('#', $input);
    $controllerObj = cargarControlador($controlador);
    cargarAccion($controllerObj, $accion);
}

