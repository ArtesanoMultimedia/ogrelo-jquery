<?php

use ezetaFrame\core\Router;
use ezetaFrame\core\Exceptions\RouteNotFoundException;

$ajax = new Router('ajax/');
$router = new Router('');


$router->add('/', function() {
    to(implode('#', [DEFAULT_CONTROLLER, DEFAULT_ACTION]));
});

$ajax->post('/usuarios/crear', function() {
    to('Usuarios#crear');
});

// compare url with all registered routes
try {
    $router->route();
} catch (RouteNotFoundException $e) {
    try {
        $ajax->route();
    } catch (RouteNotFoundException $e) {
        echo '404';
    }
}
