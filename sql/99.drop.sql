/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  azcraft
 * Created: 2.08.2021 г.
 */

USE to_do;

DROP TABLE IF EXISTS Progress;

DROP TABLE IF EXISTS Tasks_Users;
DROP TABLE IF EXISTS Tasks_Projects;

DROP TABLE IF EXISTS Tasks;

DROP TABLE IF EXISTS Projects_Users;
DROP TABLE IF EXISTS Projects_Teams;
DROP TABLE IF EXISTS Projects_Organisations;

DROP TABLE IF EXISTS Projects;

DROP TABLE IF EXISTS Users_Teams;
DROP TABLE IF EXISTS Users_Organisations;

DROP TABLE IF EXISTS Teams;

DROP Table IF EXISTS Sessions;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Organisations;


DROP USER IF EXISTS 'todo_web_app'@'localhost';
DROP DATABASE IF EXISTS to_do;
