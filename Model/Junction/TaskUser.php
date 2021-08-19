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
use Model\User;
use DateTime;
use Exception;

/**
 * Junction: a Task for User
 *
 * @author azcraft
 */
#[Table("Tasks_Users")]
#[PrimaryKey("task", "user")]
class TaskUser extends Entity
{

    const PERMISSION_WORKER = "worker";
    const PERMISSION_MANAGER = "manager";

    public ?string $note = null;
    public DateTime $created;
    protected string $permission;

    #[Traceable("users")]
    public Task $task;

    #[Traceable("tasks")]
    public User $user;

    /**
     * Creates a junction entry
     * @param User $user
     * @param Team $team
     * @param string $permission
     */
    public function __construct(Task $project,
                                User $user,
                                string $permission = self::PERMISSION_WORKER) {
        $this->user = $user;
        $this->project = $project;
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
            case self::PERMISSION_MANAGER:
            case self::PERMISSION_WORKER:
                $this->permission = $permission;
                break;

            default:
                throw new Exception("Illegal User permission in Task.");
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
