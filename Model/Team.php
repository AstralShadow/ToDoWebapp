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
use Core\Attributes\Traceable;
use Core\Attributes\TraceLazyLoad;

#[Table("Teams")]
#[PrimaryKey("team_id")]
#[TraceLazyLoad("\Model\Junction\UserTeam", "users")]
#[TraceLazyLoad("\Model\Junction\ProjectTeam", "projects")]
class Team extends Entity
{

    public string $name;
    public \DateTime $created;

    #[Traceable("teams")]
    public Organisation $organisation;

    /**
     * Creates a team in organisation
     * @param string $name
     * @param Organisation $organisations
     */
    public function __construct(string $name, Organisation $organisations) {
        $this->name = $name;
        $this->organisation = $organisations;
        $this->created = new \DateTime();
        parent::__construct();
    }

}
