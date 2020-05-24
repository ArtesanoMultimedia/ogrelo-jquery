<?php

use OGrelo\app\Usuario;
use OGrelo\core\ControladorBase;

class UsuariosController extends ControladorBase
{

    public function store()
    {
        if (isset($_POST["nombre"])) {

            //Creamos un usuario
            $usuario = new Usuario();
            $usuario->fromRequest();
            $usuario->password = sha1($_POST["password"]);
            $usuario->nueva();
            $this->redirect();
        }
    }

    public function hola()
    {
        $usuarios = new UsuariosModel();
        $usu = $usuarios->getUnUsuario();
        var_dump($usu);
    }

}
