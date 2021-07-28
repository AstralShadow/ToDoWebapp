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
use Model\User;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home extends Module
{

    public function run(Request $req): TemplateResponse {
        $response = new TemplateResponse(200, "home.html");

        $data = User::find([]);
        if (count($data) > 0){
            User::delete($data[0]->getId());
        }

        $response->setVar("var1", "?");
        $response->setVar("var2", "!");

        return $response;
    }

}
