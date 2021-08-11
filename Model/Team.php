<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

class Team extends Entity
{

    protected static string $tableName = "Teams";
    protected static string $idName = "team_id";
    public string $name;
    public Organisation $organisation;
    public \DateTime $created;

    public function __construct(Organisation $organisations, string $name) {
        $this->name = $name;
        $this->organisation = $organisations;
        $this->created = new \DateTime();
        parent::__construct();
    }

}
