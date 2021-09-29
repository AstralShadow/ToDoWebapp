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
use Core\RequestMethods\GET;
use Core\RequestMethods\PUT;
use Core\RequestMethods\POST;
use Core\RequestMethods\DELETE;
use Core\RequestMethods\Fallback;
use Core\RequestMethods\StartUp;

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

    #[GET("/{name}")]
    public static function welcome(Request $req)
    {
        $response = new TemplateResponse(file: "index.html", code: 501);
        $response->setValue("Message", $req->var("name"));

        return $response;
    }

    #[GET("/Anonymous")]
    public static function hiAnon(Request $req)
    {
        $response = new TemplateResponse(file: "index.html", code: 501);
        $response->setValue("Message", "fellow brother");

        return $response;
    }

    #[Fallback]
    public static function notFound(Request $req)
    {
        return new TemplateResponse(file: "404.html", code: 404);
    }

}
