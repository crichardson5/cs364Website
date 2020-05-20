DROP DATABASE IF EXISTS budget;

CREATE DATABASE budget;
USE budget;

CREATE TABLE systemUser (
	id INTEGER AUTO_INCREMENT,
	first_name CHARACTER VARYING(32) NOT NULL,
	last_name CHARACTER VARYING(32) NOT NULL,
	emailAddress CHARACTER VARYING(64) NOT NULL,
	password CHARACTER VARYING(700) NOT NULL,
	
	PRIMARY KEY (id)
);

CREATE TABLE userBudget (
	budget_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	budget_month INTEGER NOT NULL,
	budget_year INTEGER NOT NULL,
	
	PRIMARY KEY (budget_id),
	FOREIGN KEY (user_id) REFERENCES systemUser (id)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE budgetCategory (
	name CHARACTER VARYING (32), 
	budget_id INTEGER,
	amount_allocated INTEGER NOT NULL,
	amount_spent INTEGER NOT NULL,
	
	PRIMARY KEY (name),
	FOREIGN KEY (budget_id) REFERENCES userBudget(budget_id)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE budgetTransaction (
	transaction_id INTEGER AUTO_INCREMENT,
	t_date DATE NOT NULL,
	category_name CHARACTER VARYING (32),
	t_amount INTEGER NOT NULL,
	description CHARACTER VARYING(128),
	
	PRIMARY KEY (transaction_id),
	FOREIGN KEY (account_num) REFERENCES account (account_num)
		ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (category_name) REFERENCES budgetCategory (name)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

INSERT INTO systemUser VALUES 
('1', 'John', 'Doe', 'test@com', (SELECT sha1('test')));

INSERT INTO userBudget VALUES
('1', '1', '05', '2020');

INSERT INTO budgetCategory VALUES
('Housing', '1', '50', '50'),
('Transportation', '1', '50', '50'),
('Food', '1', '50', '50'),
('Utilities', '1', '50', '50'),
('Insurance', '1', '50', '50'),
('Debt Payments', '1', '50', '50'),
('Investing', '1', '50', '50'),
('Saving', '1', '50', '50'),
('Personal', '1', '50', '50'),
('Recreation', '1', '50', '50'),
('Miscellaneous', '1', '50', '50');
