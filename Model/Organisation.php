<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

class Organisation extends Entity
{

    protected static string $tableName = "Organisations";
    protected static string $idName = "organisation_id";
    public string $name;
    public \DateTime $created;

    public function __construct(string $name) {
        $this->name = $name;
        parent::__construct();
    }

    public function newTeam(string $name): Team {
        return new Team($this, $name);
    }

}
