DROP DATABASE progfarm;
CREATE DATABASE progfarm;

USE progfarm;

CREATE TABLE levels
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  iconpath VARCHAR(100) NOT NULL,
  
  PRIMARY KEY (id)
);

CREATE TABLE platforms
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  url VARCHAR(100) NOT NULL,
  
  PRIMARY KEY (id)
);

CREATE TABLE languages
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(15) NOT NULL,
  
  PRIMARY KEY (id)
);


CREATE TABLE problems
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  code VARCHAR(20) NOT NULL,
  title VARCHAR(30) NOT NULL,
  url VARCHAR(100) NOT NULL,
  platform_id INTEGER,
  level_id INTEGER,
  
  PRIMARY KEY (id),
  
  FOREIGN KEY (platform_id)
    REFERENCES platforms(id),
  FOREIGN KEY (level_id)
    REFERENCES levels(id)
);

CREATE TABLE users
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  privilege INTEGER NOT NULL,
  username VARCHAR(40) NOT NULL,
  password VARCHAR(40) NOT NULL,
  salt VARCHAR(10) NOT NULL,
  name VARCHAR(40),
  email VARCHAR(100),
  
  PRIMARY KEY (id)
);

CREATE TABLE submissions
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  time DATETIME NOT NULL,
  url VARCHAR(100) NOT NULL,
  srcpath VARCHAR(100) NOT NULL,
  problem_id INTEGER,
  user_id INTEGER,
  language_id INTEGER,
  
  PRIMARY KEY (id),
  
  FOREIGN KEY (problem_id)
    REFERENCES problems(id),
  FOREIGN KEY (user_id)
    REFERENCES users(id),
  FOREIGN KEY (language_id)
    REFERENCES languages(id)
);
