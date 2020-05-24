<?php

use OGrelo\core\EntidadBase;

class Usuario extends EntidadBase
{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $password;

    protected $campos = [
        'nombre' => 'string',
        'apellido' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    protected $camposPublicos = ['nombre', 'apellido', 'email'];

    protected $camposRellenables = ['nombre', 'apellido', 'email', 'password'];

    public function prueba() {
        return 'hola desde el modelo';
    }
}
