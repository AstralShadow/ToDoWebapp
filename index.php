<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "Core/autoload.php";

$controller = new Core\Controller("Home");
$controller->usePDO(
    "mysql:host=localhost;dbname=to_do",
    "todo_web_app",
    base64_decode("cDQ1NXcwUkQ=")
);

$controller->run();
// throw new Exception(" ( ͡° ͜ʖ ͡°) "); //( ͡° ͜ʖ ͡°) 

