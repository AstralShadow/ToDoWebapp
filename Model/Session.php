<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;
use \Core\Attributes\Table;
use \Core\Attributes\PrimaryKey;
use \Core\Attributes\Traceable;

#[Table("Sessions")]
#[PrimaryKey("session_id")]
class Session extends Entity
{

    const COOKIE_NAME = "ToDoSession";
    const POST_KEY = "token";

    protected string $token;
    public \DateTime $created;

    #[Traceable("sessions")]
    public User $user;

    public function __construct(User $user) {
        $this->user = $user;
        $this->token = $this->generateToken();
        $this->created = new \DateTime();
        parent::__construct();
    }

    /**
     * Returns session token
     * @return string
     */
    public function token(): string {
        return $this->token;
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
    public static function fromToken(string $token): ?Session {
        $sessions = self::find(["token" => $token]);
        return $sessions ? $sessions[0] : null;
    }

    /**
     * Loads session from the token in the chocolate cookie
     * @return Session
     */
    public static function fromCookie(): ?Session {
        $token = $_COOKIE[self::COOKIE_NAME] ?? null;

        if (isset($token)){
            $session = self::fromToken($token);
            if (isset($session)){
                return $session;
            }
        }

        return null;
    }

    /**
     * Saves this session's token into the chocolate cookie
     * @return void
     */
    public function saveInCookie(): void {
        setcookie(self::COOKIE_NAME, $this->token);
    }

    /**
     * Returns session based on $_POST
     * @return Session|null
     */
    public static function fromPOST(): ?Session {
        if (is_string($_POST[self::POST_KEY] ?? null)){
            $session = self::fromToken($_POST[self::POST_KEY]);
            if (isset($session)){
                return $session;
            }
        }
        return null;
    }

    /**
     * Tries POST, then tries chocolate cookie
     * @return Session
     */
    public static function fromPOSTorCookie(): ?Session {
        return self::fromPOST() ?? self::fromCookie();
    }

}
