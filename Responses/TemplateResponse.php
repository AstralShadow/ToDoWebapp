<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Responses;

use \Core\RequestResponse;
use \Core\Template;

/**
 * Uses php output buffering.
 * You can set headers at any time before end or request.
 *
 * @author azcraft
 */
class TemplateResponse implements RequestResponse
{

    private array $templates = [];

    /**
     * Sets http response code
     * @param int $httpResponseCode
     */
    public function __construct(int $httpResponseCode = 200) {
        http_response_code($httpResponseCode);
    }

    /**
     * Sets header
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setHeader(string $key, string $value): void {
        header("$key: $value");
    }

    /**
     * Prints templates output
     * @return void
     */
    public function serve(): void {
        foreach ($this->templates as $template){
            echo $template->run();
        }
    }

    /**
     * Addes a template to the response.
     * You'll most likely use this only once per request
     * @param Template $template
     */
    public function echo(Template $template) {
        $this->templates[] = $template;
    }

}
