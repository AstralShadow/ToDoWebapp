<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Module;
use Core\Request;
use Core\Template;
use Responses\TemplateResponse;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home implements Module
{

    public function run(Request $req): TemplateResponse {
        $response = new TemplateResponse(200);
        $template = new Template("home.html");

        $template->setVar("var1", "gosho");
        $template->setVar("var2", "yep");

        $response->echo($template);
        return $response;
    }

}
