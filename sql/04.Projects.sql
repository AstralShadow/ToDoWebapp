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

CREATE TABLE Projects(
    project_id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(100) NOT NULL,
    description NVARCHAR(4096),
    stage ENUM ('development', 'finished', 'dropped') NOT NULL,

    deadline DATETIME,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    modified DATETIME DEFAULT CURRENT_TIMESTAMP
    # Modifications are permitted only in development stage
);
