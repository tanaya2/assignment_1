CREATE DATABASE epiz_23658260_tanaya;

use epiz_23658260_tanaya;

CREATE TABLE plants (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	planttype VARCHAR(30) NOT NULL,
	height VARCHAR(30) NOT NULL,
	watered VARCHAR(30),
    notes VARCHAR(30),
	date TIMESTAMP
)