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

        /* \Model\Junction\ProjectOrganisation::init();
          \Model\Junction\ProjectTeam::init();
          \Model\Junction\ProjectUser::init();
          \Model\Junction\TaskProject::init();
          \Model\Junction\TaskUser::init();
          \Model\Junction\UserOrganisation::init();
          \Model\Junction\UserTeam::init();
          $descriptions = [];

          $descriptions["Session"] = Session::listReferenceTraces();
          $descriptions["Progress"] = Progress::listReferenceTraces();
          $descriptions["User"] = User::listReferenceTraces();
          $descriptions["Organisation"] = Organisation::listReferenceTraces();
          $descriptions["Project"] = Project::listReferenceTraces();
          $descriptions["Team"] = Team::listReferenceTraces();
          $descriptions["Task"] = Task::listReferenceTraces();

          var_dump($descriptions);
         */

        var_dump(User::get(1)->sessions());

        return $response;
    }

}
