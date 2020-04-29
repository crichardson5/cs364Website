DROP DATABASE IF EXISTS budget

CREATE DATABASE budget;
USE budget;

CREATE TABLE systemUser (
	id INTEGER AUTO_INCREMENT,
	first_name CHARACTER VARYING(32) NOT NULL,
	last_name CHARACTER VARYING(32) NOT NULL,
	email CHARACTER VARYING(64) NOT NULL,
	password CHARACTER VARYING(32) NOT NULL,
	
	PRIMARY KEY (id)
);

CREATE TABLE account (
	account_num INTEGER NOT NULL,
	balance INTEGER NOT NULL,
	
	PRIMARY KEY (account_num)
);

CREATE TABLE userBudget (
	budget_id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	budget_month INTEGER NOT NULL,
	
	PRIMARY KEY (budget_id),
	FOREIGN KEY (user_id) REFERENCES systemUser (id)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE budgetCategory (
	name CHARACTER VARYING (32), 
	amount_allocated INTEGER NOT NULL,
	amount_spent INTEGER NOT NULL,
	
	PRIMARY KEY (name)
);

CREATE TABLE budgetTransaction (
	transaction_id INTEGER AUTO_INCREMENT,
	t_date DATE NOT NULL,
	account_num INTEGER NOT NULL,
	description CHARACTER VARYING(128),
	category_name CHARACTER VARYING (32),
	
	PRIMARY KEY (transaction_id),
	FOREIGN KEY (account_num) REFERENCES account (account_num)
		ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (category_name) REFERENCES budgetCategory (name)
		ON UPDATE CASCADE ON DELETE RESTRICT
);

INSERT INTO systemUser (first_name, last_name, email, password) VALUES 
('A', 'Person', 'a@a.com', 'test');