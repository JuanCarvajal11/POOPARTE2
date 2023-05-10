CREATE DATABASE IF NOT EXISTS login_clase;
USE login_clase;

CREATE TABLE IF NOT EXISTS user(
	email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    PRIMARY KEY(email)
)ENGINE=INNODB;

INSERT INTO user (email, pass) VALUES ("admin@gmail.com","123"); 
SELECT * FROM user;
DELETE FROM user WHERE email="admin";



