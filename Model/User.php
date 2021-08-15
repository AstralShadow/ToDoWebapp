<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use Core\Entity;
use Core\Attributes\Table;
use Core\Attributes\PrimaryKey;
use Core\Attributes\TraceLazyLoad;

#[Table("Users")]
#[PrimaryKey("user_id")]
#[TraceLazyLoad("\Model\Session", "getSessions")]
#[TraceLazyLoad("\Model\Junction\UserOrganisation", "getOrganisations")]
class User extends Entity
{

    public string $name;
    public string $password;
    public \DateTime $created;

    public function __construct(string $name, string $password) {
        $this->name = $name;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->created = new \DateTime();
        parent::__construct();
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
