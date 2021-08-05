CREATE DATABASE avaliacaoODAW;

CREATE TABLE users( id int PRIMARY KEY, user_name VARCHAR(20) NOT NULL UNIQUE, password VARCHAR(10) NOT NULL );

INSERT INTO users (user_name, password) VALUES ("admin", "admi");

CREATE TABLE hotel( codh int PRIMARY KEY, nome VARCHAR(30) NOT NULL, endereco VARCHAR(50), telefone VARCHAR(30) );

INSERT INTO hotel VALUES (1, 'Hotel 1', 'Endereço hotel 1', '1234567890');

INSERT INTO hotel VALUES (2, 'Hotel 2', 'Endereço hotel 2', '9876543210');

-- https://www.w3schools.com/php/php_form_complete.asp
-- https://www.devmedia.com.br/php-sistema-de-login-com-niveis-de-acesso/37217