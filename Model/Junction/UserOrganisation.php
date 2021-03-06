<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\Junction;

use Core\Entity;
use Core\Attributes\Table;
use Core\Attributes\PrimaryKey;
use Core\Attributes\Traceable;
use Model\User;
use Model\Organisation;
use DateTime;
use Exception;

/**
 * Junction: an User in Organisation
 *
 * @author azcraft
 */
#[Table("Users_Organisations")]
#[PrimaryKey("user", "organisation")]
class UserOrganisation extends Entity
{

    const PERMISSION_WORKER = "worker";
    const PERMISSION_MANAGER = "manager";
    const PERMISSION_LEADER = "leader";

    public ?string $note = null;
    public DateTime $created;
    protected string $permission;

    #[Traceable("organisations")]
    public User $user;

    #[Traceable("users")]
    public Organisation $organisation;

    /**
     * Creates a junction entry
     * @param User $user
     * @param Organisation $organisation
     * @param string $permission
     */
    public function __construct(User $user,
                                Organisation $organisation,
                                string $permission = self::PERMISSION_WORKER) {
        $this->user = $user;
        $this->organisation = $organisation;
        $this->setPermission($permission);
        $this->created = new DateTime();
        parent::__construct();
    }

    /**
     * Setter for $permission. Throws Exception if not used with constant
     * @param string $permission
     * @return void
     * @throws Exception
     */
    public function setPermission(string $permission): void {
        switch ($permission){
            case self::PERMISSION_LEADER:
            case self::PERMISSION_MANAGER:
            case self::PERMISSION_WORKER:
                $this->permission = $permission;
                break;

            default:
                throw new Exception("Illegal User permission in Organisation.");
        }
    }

    /**
     * Getter for $permission. Compare to constants
     * @return string
     */
    public function permission(): string {
        return $this->permission;
    }

}
