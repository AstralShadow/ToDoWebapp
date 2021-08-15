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

    #[Traceable("getOrganisations")]
    public User $user;

    #[Traceable("getUsers")]
    public Organisation $organisation;

    public function __construct(User $user,
                                Organisation $organisation,
                                string $permission = self::PERMISSION_WORKER) {
        $this->user = $user;
        $this->organisation = $organisation;
        $this->permission = $permission;
        $this->created = new DateTime();
        $alreadyExists = self::get($user, $organisation);
        if (!$alreadyExists){
            parent::__construct();
        } else {
            self::load();
        }
    }

}
