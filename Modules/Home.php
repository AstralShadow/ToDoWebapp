<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use \Core\Module;
use \Core\Request;
use \Core\Responses\InstantResponse;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home extends Module
{

    public function run(Request $req): InstantResponse {
        $response = new InstantResponse(501);

        $response->echo("Not implemented.");

        return $response;
    }

}
