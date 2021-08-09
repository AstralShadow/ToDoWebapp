<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

class Project extends Entity
{

    protected static string $tableName = "Projects";
    protected static string $idName = "project_id";
    public string $name;
    public string $description;
    private string $stage;
    public ?\DateTime $deadline;
    public \DateTime $created;
    public \DateTime $modified;

    public function __construct(string $name) {
        $this->name = $name;
        parent::__construct();
    }

}
