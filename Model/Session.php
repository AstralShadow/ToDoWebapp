<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

/**
 * Description of Session
 *
 * @author azcraft
 */
class Session extends Entity
{

    protected static string $tableName = "Sessions";
    protected static string $idName = "session_id";
    public string $token;
    public User $user;
    public \DateTime $created;
    public \DateTime $last_used;

    public function __construct(User $user) {
        $this->user = $user;
        $this->token = $this->generateToken();
        parent::__construct();
    }

    /**
     * Returns random string
     * @return string
     */
    private function generateToken(int $length = 36): string {
        $chars = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        $token = (string) base_convert(time(), 10, 32);

        for ($i = strlen($token); $i < $length; ++$i){
            $index = mt_rand(0, count($chars) - 1);
            $token .= $chars[$index];
        }
        return substr($token, 0, $length);
    }

    /**
     * Returns session object from token or null
     * @param string $token
     * @return Session|null
     */
    public static function getFromToken(string $token): ?Session {
        $sessions = self::find(["token" => $token]);
        return $sessions ? $sessions[0] : null;
    }

}
