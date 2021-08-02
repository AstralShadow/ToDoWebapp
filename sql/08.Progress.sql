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

CREATE TABLE Progress(
    progress_id INT PRIMARY KEY AUTO_INCREMENT,

    task INT NOT NULL,
    user INT NOT NULL,
    value INT NOT NULL,

    note NVARCHAR(4096),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (task)
        REFERENCES Tasks(task_id),
    FOREIGN KEY (user)
        REFERENCES Users(user_id)
);
