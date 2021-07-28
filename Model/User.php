<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

/**
 * Represents a user
 *
 * @author azcraft
 */
class User extends Entity
{

    public function __construct(string $name, string $password) {
        $this->name = $name;
        $this->password = $password;
        parent::__construct();
    }

    protected static string $tableName = "Users";
    protected static string $idName = "user_id";
    public string $name;
    public string $password;
    public \DateTime $created;

    #[References(sessions)]
    public array $sessions;

}
