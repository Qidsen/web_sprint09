CREATE DATABASE sword;
CREATE USER 'yvovnenko'@'localhost' IDENTIFIED BY 'securepass';
USE sword;
GRANT ALL PRIVILEGES ON sword.* TO 'yvovnenko'@'localhost';

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  login varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  fullname varchar(100) NOT NULL,
  email varchar(100) NOT NULL
);
