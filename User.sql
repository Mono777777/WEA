/*Vytvořte databázi "weatesty"*/

CREATE TABLE Users (
  user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  bio VARCHAR(255) NOT NULL,
  score INT(11),
  vysledek1 VARCHAR(50),
  vysledek2 VARCHAR(50)
);