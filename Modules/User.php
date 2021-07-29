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
class User extends Module
{

    public function run(Request $req): ApiResponse {
        $args = $req->args();
        $method = $req->method();

        if (count($args)){
            if ($method != Request::METHOD_GET){
                return new ApiResponse(403);
            }
            return $this->getPublicData($args[0]);
        }

        if ($method == Request::METHOD_POST){
            return $this->createUser();
        }

        if ($method == Request::METHOD_GET){
            return $this->getPrivateData();
        }

        if ($method == Request::METHOD_DELETE){
            return $this->deleteUser();
        }

        $response = new ApiResponse(400);
        $response->echo([
            "error" => "Read the docs."
        ]);
        return $response;
    }

    public function createUser(): ?ApiResponse {
        if (
            !isset($_POST["name"], $_POST["password"]) ||
            !is_string($_POST["name"]) ||
            !is_string($_POST["password"])
        ){
            $response = new ApiResponse(400);
            $response->echo([
                "error" => "Send name and password to create user."
            ]);
            return $response;
        }
        $name = trim($_POST["name"]);
        $pwd = trim($_POST["password"]);

        if (strlen($name) < 2){
            $response = new ApiResponse(400);
            $response->echo([
                "error" => "Send name and password to create user."
            ]);
            return $response;
        }

        if (MUser::exists($name)){
            $response = new ApiResponse(409);
            $response->echo([
                "error" => "User already exists."
            ]);
            return $response;
        }

        new MUser($name, $pwd);
        return new ApiResponse(200);
    }

    public function getPublicData(string $name): ApiResponse {
        $user = MUser::find(["name" => $name]);
        if (count($user) == 0){
            return new ApiResponse(404);
        }

        unset($user->password);
        $response = new ApiResponse(501);
        $response->echo($user);
        return $response;
    }

    public function getPrivateData(): ApiResponse {
        $session = MSession::fromPOSTorCookie();
        if (!isset($session)){
            $response = new ApiResponse(403);
            $response->echo([
                "error" => "Forbidden"
            ]);
            return $response;
        }

        $user = $session->user;

        $response = new ApiResponse(501);
        $response->echo($user);
        return $response;
    }

    public function deleteUser(): ApiResponse {
        $session = MSession::fromPOSTorCookie();
        if (!isset($session)){
            $response = new ApiResponse(403);
            $response->echo([
                "error" => "Forbidden"
            ]);
            return $response;
        }
        $user = $session->user;
        foreach ($user->getSessions() as $session){
            MSession::delete($session);
        }

        MUser::delete($user->getId());

        return new ApiResponse(200);
    }

}
