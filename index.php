<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

$route = $_GET['route'] ?? '';
$isRouteFound = false;
foreach (app\Router::$routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}
if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}
$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName($matches);
?>