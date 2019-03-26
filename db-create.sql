CREATE DATABASE assignment_1;

use assignment_1;

CREATE TABLE entries (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	planttype VARCHAR(30) NOT NULL,
	height VARCHAR(30) NOT NULL,
	watered VARCHAR(30),
    notess VARCHAR(30),
	date TIMESTAMP
)