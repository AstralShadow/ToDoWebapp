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

/**
 * Represents a top-level group of users.
 * May contain subgroups.
 * 
 * @author azcraft
 */
#[Table("Organisations")]
#[PrimaryKey("organisation_id")]
#[TraceLazyLoad("\Model\Junction\UserOrganisation", "users")]
#[TraceLazyLoad("\Model\Team", "teams")]
#[TraceLazyLoad("\Model\Junction\ProjectOrganisation", "projects")]
class Organisation extends Entity
{

    public string $name;
    public \DateTime $created;

    /**
     * Creates an organisation
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
        $this->created = new \DateTime();
        parent::__construct();
    }

    /**
     * Creates a new Team in this organisation.
     * @param string $name
     * @return Team
     */
    public function newTeam(string $name): Team {
        return new Team($name, $this);
    }

}
