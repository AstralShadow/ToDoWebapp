/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  azcraft
 * Created: 21.07.2021 г.
 */

CREATE DATABASE to_do;
CREATE USER 'todo_web_app'@'localhost' IDENTIFIED BY 'p455w0RD';
GRANT ALL PRIVILEGES ON to_do.* TO 'todo_web_app'@'localhost';
FLUSH PRIVILEGES;

