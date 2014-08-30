DROP DATABASE progfarm;
CREATE DATABASE progfarm;

USE progfarm;

CREATE TABLE levels
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  points INTEGER,
  description VARCHAR(200),

  PRIMARY KEY (id)
);

CREATE TABLE platforms
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  url VARCHAR(100) NOT NULL,
  description VARCHAR(200),

  PRIMARY KEY (id)
);

CREATE TABLE languages
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(15) NOT NULL,
  description VARCHAR(200),

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
  description VARCHAR(200),

  PRIMARY KEY (id),

  FOREIGN KEY (platform_id)
    REFERENCES platforms(id)
    ON DELETE CASCADE,
  FOREIGN KEY (level_id)
    REFERENCES levels(id)
    ON DELETE CASCADE
);

CREATE TABLE users
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  privilege INTEGER NOT NULL,
  username VARCHAR(40) NOT NULL UNIQUE,
  password VARCHAR(40) NOT NULL,
  salt INTEGER UNSIGNED NOT NULL,
  name VARCHAR(40),
  email VARCHAR(100) NOT NULL UNIQUE,
  regtime INTEGER UNSIGNED NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE rankrewards
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  platform_id INTEGER NOT NULL,
  name VARCHAR(50) NOT NULL,
  description VARCHAR(200),
  rankl INTEGER,
  rankr INTEGER,
  points INTEGER UNSIGNED,
  
  FOREIGN KEY (platform_id)
    REFERENCES platforms(id)
    ON DELETE CASCADE,
    
  PRIMARY KEY (id)
);

CREATE TABLE projects
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  code VARCHAR(20) NOT NULL,
  name VARCHAR(50) NOT NULL,
  url VARCHAR(100) NOT NULL,
  points INTEGER UNSIGNED NOT NULL,
  description VARCHAR(200),
  
  PRIMARY KEY (id)
);

CREATE TABLE submissions_rankrewards
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  time INTEGER UNSIGNED NOT NULL,
  name VARCHAR(50) NOT NULL,
  url VARCHAR(100) NOT NULL,
  rank INTEGER UNSIGNED NOT NULL,
  rankreward_id INTEGER,
  description VARCHAR(200),
  
  FOREIGN KEY (rankreward_id)
    REFERENCES rankrewards(id)
    ON DELETE CASCADE,
    
  PRIMARY KEY (id)
);

CREATE TABLE submissions_projects
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  time INTEGER UNSIGNED NOT NULL,
  project_id INTEGER,
  url VARCHAR(100),
  description VARCHAR(200),
  
  FOREIGN KEY (project_id)
    REFERENCES projects(id)
    ON DELETE CASCADE,
  
  PRIMARY KEY (id)
);

CREATE TABLE submissions_problems
(
  id INTEGER NOT NULL AUTO_INCREMENT,
  time INTEGER UNSIGNED NOT NULL,
  url VARCHAR(100) NOT NULL,
  problem_id INTEGER,
  user_id INTEGER,
  language_id INTEGER,
  description VARCHAR(200),

  PRIMARY KEY (id),

  FOREIGN KEY (problem_id)
    REFERENCES problems(id)
    ON DELETE CASCADE,
  FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE,
  FOREIGN KEY (language_id)
    REFERENCES languages(id)
    ON DELETE CASCADE
);

ALTER TABLE submissions_problems
ADD CONSTRAINT uniq_user_problem UNIQUE (user_id, problem_id);