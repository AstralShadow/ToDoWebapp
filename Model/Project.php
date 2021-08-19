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
use DateTime;
use Exception;

#[Table("Projects")]
#[PrimaryKey("project_id")]
#[TraceLazyLoad("\Model\Junction\ProjectOrganisation", "organisations")]
#[TraceLazyLoad("\Model\Junction\ProjectTeam", "teams")]
#[TraceLazyLoad("\Model\Junction\ProjectUser", "users")]
#[TraceLazyLoad("\Model\Junction\TaskProject", "tasks")]
class Project extends Entity
{

    const STAGE_DEVELOPMENT = 'development';
    const STAGE_FINISHED = 'finished';
    const STAGE_DROPPED = 'dropped';

    public string $name;
    public string $description;
    protected string $stage;
    public ?DateTime $deadline;
    public DateTime $created;
    public DateTime $modified;

    /**
     * Creates a new project
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
        $this->created = new DateTime();
        $this->modified = new DateTime();
        $this->stage = self::STAGE_DEVELOPMENT;
        parent::__construct();
    }

    /**
     * Getter for 
     * @return string
     */
    public function stage(): string {
        return $this->stage;
    }

    /**
     * Setter for $stage
     * @param string $stage
     * @return void
     * @throws Exception
     */
    public function setStage(string $stage): void {
        switch ($stage){
            case self::STAGE_DEVELOPMENT:
            case self::STAGE_FINISHED:
            case self::STAGE_DROPPED:
                $this->stage = $stage;
                break;
            default:
                throw new Exception("Tried to set illegal project stage");
        }
    }

}
