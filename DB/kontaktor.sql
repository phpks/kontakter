DROP DATABASE IF EXISTS kontaktor;

CREATE DATABASE kontaktor;

USE kontaktor;

GRANT ALL PRIVILEGES ON kontaktor.* TO 'kontaktor'@'localhost' IDENTIFIED BY 'kfs2015';

CREATE TABLE IF NOT EXISTS contacts (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone_num VARCHAR(15),
	image_path VARCHAR(60),
	PRIMARY KEY (id)
);

INSERT INTO contacts(name,email,phone_num) VALUES('Jonathan Cohen', 'jonthan@gmail.com','054-4545454'), ('Michal Kislasi','michal@gmail.com','058-4845654'),('Matan Gottlieb','matan@gmail.com','058-4488660');