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

CREATE TABLE Tasks_Projects(
    task INT NOT NULL,
    project INT NOT NULL,

    priority INT NOT NULL DEFAULT 1,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (task, project),
    FOREIGN KEY (task)
		REFERENCES Tasks(task_id),
    FOREIGN KEY (project)
		REFERENCES Projects(project_id)
);

