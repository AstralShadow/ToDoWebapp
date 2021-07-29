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
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        parent::__construct();
    }

    protected static string $tableName = "Users";
    protected static string $idName = "user_id";
    public string $name;
    public string $password;
    public \DateTime $created;

    public function getSessions(): array {
        return Session::find(["user" => $this]);
    }

    public static function login(string $name, string $password): ?User {
        $user = self::find(["name" => $name])[0] ?? null;
        if (!isset($user) || !password_verify($password, $user->password)){
            return null;
        }
        return $user;
    }

    public static function exists(string $name): bool {
        return count(self::find(["name" => $name]));
    }

}
