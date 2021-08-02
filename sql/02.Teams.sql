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

CREATE TABLE Teams(
    team_id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(60),
    organisation INT NOT NULL,

    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (organisation)
        REFERENCES Organisations(organisation_id)
);

