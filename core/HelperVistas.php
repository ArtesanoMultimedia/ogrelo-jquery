<?php

namespace ezetaFrame\core;

class HelperVistas
{

    public function url($controlador = DEFAULT_CONTROLLER, $accion = DEFAULT_ACTION)
    {
        $urlString = "$controlador/$accion";
        return $urlString;
    }

    public function ajaxUrl($controlador = DEFAULT_CONTROLLER, $accion = DEFAULT_ACTION)
    {
        $urlString = "ajax/$controlador/$accion";
        return $urlString;
    }


    //Helpers para las vistas
}
