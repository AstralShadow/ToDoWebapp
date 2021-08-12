<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use \Core\Module;
use \Core\Request;
use Core\Responses\BufferedResponse;
use \Model\Session;
use \Model\User;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home extends Module
{

    public function run(Request $req): BufferedResponse {
        $response = new BufferedResponse(501);

        Session::init();
        $user = User::get(1);
        var_dump($user->getSessions());

        return $response;
    }

}
