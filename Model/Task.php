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

#[Table("Tasks")]
#[PrimaryKey("task_id")]
#[TraceLazyLoad("\Model\Junction\TaskProject", "projects")]
#[TraceLazyLoad("\Model\Junction\TaskUser", "users")]
#[TraceLazyLoad("\Model\Progress", "progress")]
class Task extends Entity
{

    const TYPE_ACTIONS = "actions";
    const TYPE_TIME = "time";

    public string $name;
    public ?string $description;
    protected string $type;
    public int $initial = 0;
    public ?int $goal = null;
    public \DateTime $created;

    public function __construct(string $name,
                                string $type = self::TYPE_ACTIONS) {
        $this->name = $name;
        $this->created = new \DateTime();
        $this->setType($type);
        parent::__construct();
    }

    /**
     * Getter for $type
     * @return string
     */
    public function type(): string {
        return $this->type;
    }

    /**
     * Setter for $type
     * @param string $type
     * @return void
     * @throws Exception
     */
    public function setType(string $type): void {
        switch ($type){
            case self::TYPE_ACTIONS:
            case self::TYPE_TIME:
                $this->type = $type;
                break;
            default:
                throw new Exception("Illegal type for task");
        }
    }

    public function totalProgress(): int {
        $pdo = self::getPDO();
        $query = $pdo->prepare(<<<EOF
                SELECT SUM(value) as progress
                FROM Progress
                WHERE task = ?
            EOF);
        $query->execute([$this->getId()]);
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        return $this->initial + (int) $data["progress"];
    }

}
