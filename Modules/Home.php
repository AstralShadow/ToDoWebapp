<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules;

use Core\Module;
use Core\Request;
use Core\Responses\InstantResponse;
use Model\User;
use Model\Organisation;
use Model\Progress;
use Model\Project;
use Model\Team;
use Model\Task;
use Model\Session;

/**
 * Description of Home
 *
 * @author azcraft
 */
class Home extends Module
{

    public function run(Request $req): InstantResponse {
        $response = new InstantResponse(501);
        define("DEBUG_STATUS_STRING", 1);

        \Model\Junction\ProjectOrganisation::init();
        \Model\Junction\ProjectTeam::init();
        \Model\Junction\ProjectUser::init();
        \Model\Junction\TaskProject::init();
        \Model\Junction\TaskUser::init();
        \Model\Junction\UserOrganisation::init();
        \Model\Junction\UserTeam::init();

        var_dump("User", User::listReferenceTraces());
        var_dump("Organisation", Organisation::listReferenceTraces());
        var_dump("Progress", Progress::listReferenceTraces());
        var_dump("Project", Project::listReferenceTraces());
        var_dump("Team", Team::listReferenceTraces());
        var_dump("Task", Task::listReferenceTraces());
        var_dump("Session", Session::listReferenceTraces());

        return $response;
    }

}
