DROP DATABASE IF EXISTS budget;

CREATE DATABASE budget;
USE budget;

CREATE TABLE systemUser (
	id INTEGER AUTO_INCREMENT,
	first_name CHARACTER VARYING(32) NOT NULL,
	last_name CHARACTER VARYING(32) NOT NULL,
	emailAddress CHARACTER VARYING(64) NOT NULL,
	password CHARACTER VARYING(700) NOT NULL,
	login BOOLEAN, 
	
	PRIMARY KEY (id)
);

CREATE TABLE userBudget (
	budget_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	budget_date DATE NOT NULL,
	PRIMARY KEY (budget_id),
	FOREIGN KEY (user_id) REFERENCES systemUser (id)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE budgetCategory (
	category_id INTEGER AUTO_INCREMENT,
	name CHARACTER VARYING (32), 
	budget_id INTEGER,
	amount_allocated INTEGER NOT NULL,
	amount_spent INTEGER NOT NULL,
	
	PRIMARY KEY (category_id),
	FOREIGN KEY (budget_id) REFERENCES userBudget(budget_id)
		ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE budgetTransaction (
	transaction_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	t_date DATE NOT NULL,
	t_amount INTEGER NOT NULL,
	description CHARACTER VARYING(128),
	category_name CHARACTER VARYING (32),
	
	PRIMARY KEY (transaction_id),
	FOREIGN KEY (user_id) REFERENCES systemUser (id)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

INSERT INTO systemUser VALUES 
('1', 'John', 'Doe', 'test@com', (SELECT sha1('test')), TRUE);

INSERT INTO userBudget VALUES
('1', '1', '2020-05-01');

INSERT INTO budgetCategory (name, budget_id, amount_allocated, amount_spent) VALUES
('Housing', '1', '50', '50'),
('Transportation', '1', '50', '50'),
('Food', '1', '50', '50'),
('Utilities', '1', '50', '50'),
('Insurance', '1', '50', '50'),
('Debt Payments', '1', '50', '50'),
('Investing', '1', '50', '50'),
('Savings', '1', '50', '50'),
('Personal', '1', '50', '50'),
('Recreation', '1', '50', '50'),
('Miscellaneous', '1', '50', '50');

INSERT INTO budgetTransaction VALUES
('1', '1', '2020-04-04', '50', 'test', 'Housing');
