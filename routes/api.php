<?php

use Router\Router;
use Router\RouteNotFoundException;

$router = new Router('');

$controlador = DEFAULT_CONTROLLER;
$accion = DEFAULT_ACTION;

$router->add('', function() {
    to(implode('#', [DEFAULT_CONTROLLER, DEFAULT_ACTION]));
});

$router->add('/usuarios/crear', function() {
    echo 'crear usuarios';
//    to('Usuarios#crear');
});

// compare url with all registered routes
try {
    $router->route();
} catch (RouteNotFoundException $e) {
    echo '404';
}
