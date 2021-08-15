<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

class Task extends Entity
{

    protected static string $tableName = "Tasks";
    protected static string $idName = "task_id";
    public string $name;
    public ?string $description;
    protected string $type;
    protected ?int $initial;
    protected ?int $goal;
    public \DateTime $created;

    public function __construct(string $name) {
        $this->name = $name;
        $this->created = new \DateTime();
        parent::__construct();
    }

}
