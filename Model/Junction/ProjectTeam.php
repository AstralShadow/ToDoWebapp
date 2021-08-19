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
use Model\Project;
use Model\Team;
use DateTime;

/**
 * Junction: a Project for Team
 *
 * @author azcraft
 */
#[Table("Projects_Teams")]
#[PrimaryKey("project", "team")]
class ProjectTeam extends Entity
{

    public DateTime $created;

    #[Traceable("projects")]
    public Team $team;

    #[Traceable("teams")]
    public Project $project;

    /**
     * Creates a junction entry
     * @param Project $project
     * @param Team $team
     */
    public function __construct(Project $project, Team $team) {
        $this->project = $project;
        $this->team = $team;
        $this->created = new DateTime();
        parent::__construct();
    }

}
