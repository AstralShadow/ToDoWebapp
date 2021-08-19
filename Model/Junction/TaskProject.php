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
use Model\Task;
use Model\Project;
use DateTime;

/**
 * Junction: a Task in Project
 *
 * @author azcraft
 */
#[Table("Tasks_Projects")]
#[PrimaryKey("task", "project")]
class TaskProject extends Entity
{

    public int $priority = 1;
    public DateTime $created;

    #[Traceable("tasks")]
    public Project $project;

    #[Traceable("projects")]
    public Task $task;

    /**
     * Creates a junction entry
     * @param Task $task
     * @param Project $project
     * @param int $priority
     */
    public function __construct(Task $task, Project $project, int $priority) {
        $this->task = $task;
        $this->project = $project;
        $this->priority = $priority;
        $this->created = new DateTime();
        parent::__construct();
    }

}
