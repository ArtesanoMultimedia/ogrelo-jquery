<?php

namespace ezetaFrame\core;

use ezetaFrame\core\HelperVistas;

class ControladorBase
{

    public function __construct()
    {
        //Incluir todos los modelos
        foreach (glob("app/Models/*.php") as $file) {
            require_once $file;
        }
    }

    //Plugins y funcionalidades

    /*
    * Este método lo que hace es recibir los datos del controlador en forma de array
    * los recorre y crea una variable dinámica con el indice asociativo y le da el
    * valor que contiene dicha posición del array, luego carga los helpers para las
    * vistas y carga la vista que le llega como parámetro. En resumen un método para
    * renderizar vistas.
    */
    public function view($vista, $datos)
    {
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc} = $valor;
        }

        $helper = new HelperVistas();

        require_once __DIR__ . '/../app/Views/' . $vista . 'View.php';
    }

    public function redirect($controlador = DEFAULT_CONTROLLER, $accion = DEFAULT_ACTION)
    {
        header("Location:index.php?controller=" . $controlador . "&action=" . $accion);
    }

    //Métodos para los controladores

}
