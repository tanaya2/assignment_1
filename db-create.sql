CREATE DATABASE plant_tracker;

use plant_tracker;

CREATE TABLE plants (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	planttype VARCHAR(30) NOT NULL,
	height VARCHAR(30) NOT NULL,
	watered VARCHAR(30),
    notes VARCHAR(30),
	date TIMESTAMP
)