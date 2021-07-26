<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Session
 *
 * @author azcraft
 */
class Session extends Core\Entity
{

    private static string $tableName = "Sessions";
    private string $token;
    private User $user;

}
