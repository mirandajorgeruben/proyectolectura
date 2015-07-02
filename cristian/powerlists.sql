CREATE DATABASE powerlists;

USE powerlists;

CREATE TABLE usuario(
	cod_usuario int primary key,
	usuario varchar(30),
	pass varchar(30),
	cpass varchar(30)
);

