CREATE DATABASE empresa_teste CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use empresa_teste;

CREATE TABLE Cliente_teste (
	id_cliente INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) UNIQUE
);

INSERT INTO Cliente_teste(nome,endereco,telefone,email) VALUES
	('Igor da Silva Dias','Rua LAMBADA','1111-222', 'JKSJALJ@gmail.com'),
    ('Samnsungo','Rua alemanha','0000-9090', 'JKfAgdLJ@gmail.com')
;