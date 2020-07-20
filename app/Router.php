<?php
namespace app;

class Router
{
    public static $routes = [
        '~^$~' => [\app\controllers\MainController::class, 'main'],
        '~^create/$~' => [\app\controllers\CreateController::class, 'main'],
        '~^create/set$~' => [\app\controllers\CreateController::class, 'set'],
        '~^[0-9]+$~' => [\app\controllers\MainController::class, 'main'],
        '~^login/$~' => [\app\controllers\LoginController::class, 'main'],
        '~^login/up$~' => [\app\controllers\LoginController::class, 'loginUp'],
        '~^login/out$~' => [\app\controllers\LoginController::class, 'loginOut'],
        '~^edit/$~' => [\app\controllers\EditController::class, 'main'],
        '~^edit/update$~' => [\app\controllers\EditController::class, 'update'],
    ];

}
?>