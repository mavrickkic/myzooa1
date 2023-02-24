DROP DATABASE IF EXISTS my_zoo;
CREATE DATABASE my_zoo;
USE my_zoo;  -- MySQL command

-- create the tables
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE animals (
  animalID        INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  animalName      VARCHAR(10)    NOT NULL   UNIQUE,
  age             INT(255)   NOT NULL,
  gender          VARCHAR(2)  NOT NULL,
  animalWeight    DECIMAL(4,3)  NOT NULL,
  isPregnant         VARCHAR(2)  NOT NULL,

  PRIMARY KEY (animalID)
);

-- insert data into the database
INSERT INTO categories VALUES
(1, 'Platypus'),
(2, 'Basses'),
(3, 'Drums');

INSERT INTO animals VALUES
(1, 1, 'Perry', 2, 'Female', '8.2', 'true'),
(2, 1, 'Harry', 2, 'Male', '8.2', 'false'),
(3, 1, 'Sherry', 2, 'Female', '852', 'true'),
(4, 1, 'Cherry', 2, 'Female', '8.2', 'true');
-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON my_zoo.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';
