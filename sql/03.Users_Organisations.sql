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

CREATE TABLE Users_Organisations(
    user INT NOT NULL,
    organisation INT NOT NULL,

    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    note NVARCHAR(4096),

    permission ENUM('worker', 'manager', 'leader') NOT NULL,
    # leader - permission to add and remove users + manager permissions
    # manager - permission to add, remove, modify teams and projects
    # worker - no special permissions

    PRIMARY KEY (user, organisation),
    FOREIGN KEY (user)
        REFERENCES Users(user_id),
    FOREIGN KEY (organisation)
        REFERENCES Organisations(organisation_id)
);
