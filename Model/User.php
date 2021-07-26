<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Represents a user
 *
 * @author azcraft
 */
class User extends Core\Entity
{

    private static string $tableName = "Users";
    public string $name;
    public string $password;

}
