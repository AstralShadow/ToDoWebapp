<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Module;
use Core\Request;
use Responses\BufferedResponse;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home implements Module
{

    public function run(Request $req): BufferedResponse {
        $response = new BufferedResponse();
        return $response;
    }

}
