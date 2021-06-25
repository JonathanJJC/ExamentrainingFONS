DROP DATABASE IF EXISTS examentraining;

-- create new db
CREATE DATABASE examentraining;
-- select users as the default database
USE examentraining;

-- statement to create table usertype
CREATE TABLE usertype(
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(255) UNIQUE NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE departments(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	postcode VARCHAR(255) NOT NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	PRIMARY KEY(id)
	);

-- statement to create table users
CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	type_id INT NOT NULL,
	email VARCHAR(255) NOT NULL UNIQUE,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(250) NOT NULL,
	created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(type_id) REFERENCES usertype(id)
);

-- statement to create table users
CREATE TABLE hours(
	id INT,
	departement_id INT,
	start_at TIME,
	end_at TIME ,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL,
	FOREIGN KEY(id) REFERENCES users(id) ON DELETE CASCADE,
	FOREIGN KEY(departement_id) REFERENCES departments(id)
);

CREATE TABLE department_user(
	departement_id INT,
	user_id INT,
	UNIQUE(departement_id, user_id),
	FOREIGN KEY(departement_id) REFERENCES departments(id) ON DELETE CASCADE,
	FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- insert entries into table departments (admin AND users)
INSERT INTO departments VALUES 
	(NULL, 'Calvin Klein', '1073JH', now(), now()), 
	(NULL, 'Hugo Boss', '1245GG', now(), now()), 
	(NULL, 'Footlocker', '1235LL', now(), now()), 
	(NULL, 'H&M', '1073JH', now(), now()), 	
	(NULL, 'Jack Klein', '4419AB', now(), now()), 
	(NULL, 'Marvin & Marvin', '8289AJ', now(), now());

-- Ga eerst naar index.php, hier insert de code een admin en een gebruiker toe met een hashed pw. Daarna kunt u de code onderaan uitvoeren

-- insert entries into table usertype (admin AND users)
INSERT INTO usertype VALUES 
	(NULL, 'admin', now(), now()), 
	(NULL, 'user', now(), now());

-- insert entries into table hours (admin AND users)
	-- INSERT INTO hours VALUES 
	-- ( '1', '1', now(), now(), now(), now()), 
	-- ( '2', '2', now(), now(), now(), now());

	-- INSERT INTO department_user VALUES
	-- ('1','1'),
	-- ('2','2');
--innsrerjoin selecteert alles dat volledig gevuld is

--left join selecteert alles