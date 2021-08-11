<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \Core\Entity;

class Progress extends Entity
{

    protected static string $tableName = "Progress";
    protected static string $idName = "progress_id";
    public Task $task;
    public User $user;
    public int $value;
    public ?string $note;
    public \DateTime $created;

    public function __construct(Task $task, User $user, int $value) {
        $this->task = $task;
        $this->task = $user;
        $this->task = $value;
        $this->created = new \DateTime();
        parent::__construct();
    }

}
