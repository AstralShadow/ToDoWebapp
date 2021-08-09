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

CREATE TABLE Tasks(
    task_id INT PRIMARY KEY AUTO_INCREMENT,

    name NVARCHAR(100) NOT NULL,
    description NVARCHAR(4096),

    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    type ENUM ('actions', 'time') NOT NULL,
    initial INT DEFAULT 0,
    goal INT
);
