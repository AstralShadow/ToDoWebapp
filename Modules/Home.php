<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Request;
use Core\Responses\{
    InstantResponse,
    BufferedResponse,
    TemplateResponse
};
use Core\Routes\{
    GET,
    PUT,
    POST,
    DELETE,
    NotFound,
    StartUp
};

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home
{

    #[StartUp]
    public static function turnOnDebug(): void {
        define("DEBUG_STATUS_STRING", 1);
    }

    #[GET("/")]
    public static function index(Request $req) {
        $response = new TemplateResponse(file: "index.html", code: 501);

        return $response;
    }

    #[NotFound]
    public static function notFound(Request $req) {
        return new TemplateResponse(file: "404.html", code: 404);
    }

}
