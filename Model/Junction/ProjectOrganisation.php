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
use Model\Organisation;
use DateTime;

/**
 * Junction: a Project for Organisation
 *
 * @author azcraft
 */
#[Table("Projects_Organisations")]
#[PrimaryKey("project", "organisation")]
class ProjectOrganisation extends Entity
{

    public DateTime $created;

    #[Traceable("projects")]
    public Organisation $organisation;

    #[Traceable("organisations")]
    public Project $project;

    /**
     * Creates a junction entry
     * @param Project $project
     * @param Organisation $organisation
     */
    public function __construct(Project $project, Organisation $organisation) {
        $this->project = $project;
        $this->organisation = $organisation;
        $this->created = new DateTime();
        parent::__construct();
    }

}
