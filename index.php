<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\AuthController;
use FastRoute\RouteCollector;

session_start();

//FastRouter
$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
    $r->addGroup('/tasks', function (RouteCollector $r) {
        $r->get( '', 'TasksController@index');
        $r->get( '/{id:\d+}', 'TasksController@show');
        $r->get( '/create', 'TasksController@create');
        $r->get( '/{id:\d+}/edit', 'Auth/TasksController@edit');
        $r->post( '', 'TasksController@store');
        $r->post( '/{id:\d+}/update', 'Auth/TasksController@update');
        $r->post( '/{id:\d+}/delete', 'Auth/TasksController@delete');
    });
    $r->get( '/login', 'AuthController@login');
    $r->post( '/login', 'AuthController@loginUp');
    $r->get( '/logout', 'AuthController@logOut');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $protection = explode('/', $handler);
        //проверка на доступ без авторизации
        if ($protection[0] === 'Auth') {
            if (!AuthController::check()) {
                (new AuthController())->login();
                break;
            }
            $handler = $protection[1];
        }

        list($class, $method) = explode('@',$handler,2);
        $class = 'App\Controllers\\'.$class;
        call_user_func_array([new $class, $method], $vars);
        break;
}
?>