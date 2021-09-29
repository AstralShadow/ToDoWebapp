<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Request;
use Core\Responses\InstantResponse;
use Core\Responses\BufferedResponse;
use Core\Responses\TemplateResponse;
use Core\Routes\GET;
use Core\Routes\PUT;
use Core\Routes\POST;
use Core\Routes\DELETE;
use Core\Routes\NotFound;
use Core\Routes\StartUp;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home
{

    #[StartUp]
    public static function turnOnDebug(): void
    {
        define("DEBUG_STATUS_STRING", 1);
    }

    #[GET("/")]
    public static function index(Request $req)
    {
        $response = new TemplateResponse(file: "index.html", code: 501);

        return $response;
    }

    //#[GET("/{name=Anonymous}")]
    #[GET("/{name}")]
    public static function welcome(Request $req, string $name) {
        $response = new TemplateResponse(file: "index.html", code: 501);
        $response->setValues("Message", $name);

        return $response;
    }

    #[NotFound]
    public static function hiAnon(Request $req)
    {
        return new TemplateResponse(file: "404.html", code: 404);
    }

}
