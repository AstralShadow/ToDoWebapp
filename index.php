<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "Core/autoload.php";
$controller = new Core\Controller("Home");
$controller->execute();
$controller->serve();
throw new Exception(" ( ͡° ͜ʖ ͡°) ");
