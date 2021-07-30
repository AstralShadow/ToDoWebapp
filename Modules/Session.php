<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use \Core\Module;
use \Core\Request;
use \Core\Responses\ApiResponse;
use \Model\User as MUser;
use \Model\Session as MSession;

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

        $response = new ApiResponse(400);
        $response->echo([
            "error" => "Невалидна заявка"
        ]);
        return $response;
    }

    public function getData() {
        $session = MSession::fromPOSTorCookie();
        if (!isset($session)){
            $response = new ApiResponse(404);
            $response->echo([
                "error" => "Невалидна сесия"
            ]);
            return $response;
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
                "error" => "Изпратете name и password за да влезете"
            ]);
            return $response;
        }
        $name = trim($_POST["name"]);
        $pwd = trim($_POST["password"]);

        $user = MUser::login($name, $pwd);
        if ($user){
            $session = new MSession($user);
            $session->saveInCookie();

            $response = new ApiResponse(200);
            $response->echo([
                "token" => $session->token
            ]);
            return $response;
        }

        $response = new ApiResponse(403);
        $response->echo([
            "error" => "Грешно име или парола"
        ]);
        return $response;
    }

    public function delete() {
        $session = MSession::fromPOSTorCookie();
        if (!isset($session)){
            $response = new ApiResponse(404);
            $response->echo([
                "error" => "Сесията не е намерена"
            ]);
            return $response;
        }

        MSession::delete($session->getId());
        return new ApiResponse(200);
    }

}
