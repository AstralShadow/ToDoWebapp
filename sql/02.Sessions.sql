/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  azcraft
 * Created: 26.07.2021 г.
 */

USE to_do;

CREATE TABLE Sessions(
    session_id INT PRIMARY KEY AUTO_INCREMENT,
    token CHAR(36) NOT NULL UNIQUE,
    user INT NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES Users(user_id)
);
