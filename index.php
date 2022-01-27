<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#define("DEBUG_PRINT_QUERY_TYPES", 1);
#define("DEBUG_AUTOLOAD_LOG", 1);
#define("DEBUG_STATUS_STRING", 1);

$start = microtime(1);

require "Core/autoload.php";

$router = new Core\Router();
$router->add("\Modules\Home", "/");
$router->add("\Modules\Session", "session");
$router->add("\Modules\User", "user");

$controller = new Core\Controller($router);
$controller->usePDO(
    "mysql:host=localhost;dbname=to_do",
    "todo_web_app",
    base64_decode("cDQ1NXcwUkQ=")
);

$controller->run();

if (defined("DEBUG_STATUS_STRING")){
    echo "( ͡° ͜ʖ ͡°) <br />\n";

    $end = microtime(1);
    echo "Time: ";
    echo ($end - $start) * 1000;
    echo "ms <br />\n";

    echo "Memory: " . Core\getMemoryUsage() . "<br />\n";
    \Core\Entity::printDebugStats();
}
