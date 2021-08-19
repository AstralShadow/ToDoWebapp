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
use DateTime;

#[Table("Progress")]
#[PrimaryKey("progress_id")]
class Progress extends Entity
{

    public int $value;
    public ?string $note;
    public DateTime $created;

    #[Traceable("progress")]
    public Task $task;

    #[Traceable("progress")]
    public User $user;

    public function __construct(Task $task, User $user, int $value) {
        $this->task = $task;
        $this->task = $user;
        $this->task = $value;
        $this->created = new DateTime();
        parent::__construct();
    }

}
