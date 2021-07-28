<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "Core/autoload.php";

$controller = new Core\Controller("Home");
$controller->usePDO("mysql:host=localhost;dbname=to_do", "todo_web_app", "p455w0RD");

$controller->run();

$name = "Gosho";
$user = Model\User::find(["name" => $name])[0];
$sessions = Model\Session::find(["user" => $user]);
var_dump(count($sessions), $user);

var_dump($sessions[0]);

throw new Exception(" ( ͡° ͜ʖ ͡°) "); //( ͡° ͜ʖ ͡°) 

