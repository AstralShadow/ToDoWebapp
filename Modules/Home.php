<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Module;
use Core\Request;
use Core\Responses\TemplateResponse;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home extends Module
{

    public function run(Request $req): TemplateResponse {
        $response = new TemplateResponse(200, "home.html");

        $response->setVar("var1", "gosho");
        $response->setVar("var2", 2);

        return $response;
    }

}
