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

CREATE TABLE Users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(60) NOT NULL UNIQUE,
    password CHAR(60) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP
);
