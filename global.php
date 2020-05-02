<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/core/Conectar.php';
require_once __DIR__ . '/core/EntidadBase.php';
require_once __DIR__ . '/core/HelperVistas.php';
require_once __DIR__ . '/core/ModeloBase.php';
require_once __DIR__ . '/config/Constants.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Route.php';
require_once __DIR__ . '/core/Exceptions/RouteNotFoundException.php';

$conectar = new ezetaFrame\core\Conectar();
$conexion = $conectar->conexion();


