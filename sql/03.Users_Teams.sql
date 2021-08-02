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

CREATE TABLE Users_Teams(
    user INT NOT NULL,
    team INT NOT NULL,

    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    note NVARCHAR(4096),

    permission ENUM('worker', 'manager') NOT NULL,
    # manager - permission to add, remove, modify and assign tasks
    # worker - no special permissions

    PRIMARY KEY (user, team),
    FOREIGN KEY (user)
        REFERENCES Users(user_id),
    FOREIGN KEY (team)
        REFERENCES Teams(team_id)
);
