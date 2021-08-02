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

CREATE TABLE Projects_Organisations(
    project INT NOT NULL,
    organisation INT NOT NULL,

    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (project, organisation),
    FOREIGN KEY (project)
        REFERENCES Projects(project_id),
    FOREIGN KEY (organisation)
        REFERENCES Organisations(organisation_id)
);
