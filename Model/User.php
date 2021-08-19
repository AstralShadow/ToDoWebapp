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
#[TraceLazyLoad("\Model\Session", "sessions")]
#[TraceLazyLoad("\Model\Junction\UserOrganisation", "organisations")]
#[TraceLazyLoad("\Model\Junction\UserTeam", "teams")]
#[TraceLazyLoad("\Model\Junction\ProjectUser", "projects")]
#[TraceLazyLoad("\Model\Junction\TaskUser", "tasks")]
#[TraceLazyLoad("\Model\Progress", "progress")]
class User extends Entity
{

    public string $name;
    public string $password;
    public \DateTime $created;

    /**
     * Registers a user
     * @param string $name
     * @param string $password
     */
    public function __construct(string $name, string $password) {
        $this->name = $name;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->created = new \DateTime();
        parent::__construct();
    }

    /**
     * Returns user object based on credentials
     * @param string $name
     * @param string $password
     * @return User|null
     */
    public static function login(string $name, string $password): ?User {
        $user = self::find(["name" => $name])[0] ?? null;
        if (!isset($user) || !password_verify($password, $user->password)){
            return null;
        }
        return $user;
    }

    /**
     * Returns whether a user exists
     * @param string $name
     * @return bool
     */
    public static function exists(string $name): bool {
        return count(self::find(["name" => $name]));
    }

}
