<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Module;
use Core\Request;
use Core\Responses\ApiResponse;
use Model\User as MUser;
use Model\Session as MSession;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Session extends Module
{

    public function run(Request $req): ApiResponse {
        $method = $req->method();

        if ($method == Request::METHOD_GET){
            return $this->getData();
        }

        if ($method == Request::METHOD_POST){
            return $this->login();
        }

        if ($method == Request::METHOD_DELETE){
            return $this->delete();
        }

        return new ApiResponse(400);
    }

    public function getData() {
        $session = MSession::fromPOSTorCookie();
        if (!isset($session)){
            return new ApiResponse(404);
        }

        $response = new ApiResponse(200);
        $response->echo([
            "user" => $session->user->name,
            "loginTime" => $session->created,
            "token" => $session->token
        ]);
        return $response;
    }

    public function login() {
        if (
            !isset($_POST["name"], $_POST["password"]) ||
            !is_string($_POST["name"]) ||
            !is_string($_POST["password"])
        ){
            $response = new ApiResponse(400);
            $response->echo([
                "error" => "Send name and password to login."
            ]);
            return $response;
        }
        $name = trim($_POST["name"]);
        $pwd = trim($_POST["password"]);

        $user = MUser::login($name, $pwd);
        if ($user){
            $session = new MSession($user);
            $session->saveInCookie();

            $response = new ApiResponse(201);
            $response->echo([
                "token" => $session->token
            ]);
            return $response;
        }

        return new ApiResponse(403);
    }

    public function delete() {
        $session = MSession::fromPOSTorCookie();
        if (!isset($session)){
            return new ApiResponse(404);
        }

        MSession::delete($session->getId());
        return new ApiResponse(200);
    }

}
