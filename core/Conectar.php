<?php

namespace ezetaFrame\core;

use ezetaFrame\config\Database;
use mysqli;

class Conectar
{
    private $driver, $host, $user, $pass, $database, $charset;

    public function __construct()
    {
        $this->driver = Database::$driver;
        $this->host = Database::$host;
        $this->user = Database::$user;
        $this->pass = Database::$pass;
        $this->database = Database::$database;
        $this->charset = Database::$charset;
    }

    public function conexion()
    {
        $conexion = false;

        if ($this->driver == 'mysql' || $this->driver == null) {
            $conexion = new mysqli($this->host, $this->user, $this->pass, $this->database);
            if (mysqli_connect_errno()) {
                throw new Exception('Falló la conexión: ' . mysqli_connect_error());
            }
            $conexion->set_charset($this->charset);
        }

        return $conexion;
    }

    public function startFluent()
    {
        require_once "FluentPDO/FluentPDO.php";

        if ($this->driver == "mysql" || $this->driver == null) {
            $pdo = new PDO($this->driver . ":dbname=" . $this->database, $this->user, $this->pass);
            $fpdo = new FluentPDO($pdo);
        }

        return $fpdo;
    }
}
