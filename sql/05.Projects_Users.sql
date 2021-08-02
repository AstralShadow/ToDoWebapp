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

CREATE TABLE Projects_Users(
    project INT NOT NULL,
    user INT NOT NULL,

    note NVARCHAR(4096),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    permission ENUM('worker', 'manager') NOT NULL,
    # for projects that aren't assigned to teams or organisations

    PRIMARY KEY (project, user),
    FOREIGN KEY (project)
        REFERENCES Projects(project_id),
    FOREIGN KEY (user)
        REFERENCES Users(user_id)
);
