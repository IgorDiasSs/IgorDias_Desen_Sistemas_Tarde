CREATE DATABASE IF NOT EXISTS empresa ;
use empresa;
CREATE TABLE Cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome_cliente VARCHAR(50) NOT NULL,
    endereco_cliente VARCHAR(50) NOT NULL,
    telefone_cliente varchar(15) NOT NULL,
    email_cliente VARCHAR(50) NOT NULL
);


CREATE TABLE usuario(
    id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_usuario VARCHAR(50) DEFAULT NULL,
    usuario VARCHAR(10) DEFAULT NULL,
    senha_usuario VARCHAR(32) DEFAULT NULL,
    nivel INT DEFAULT NULL
);


INSERT INTO Cliente (nome_cliente, endereco_cliente, telefone_cliente, email_cliente) VALUES
('João Silva', 'Rua das Flores, 123 - São Paulo/SP','1111-1111', 'joao.silva@email.com'),
('Maria Oliveira', 'Avenida Brasil, 456 - Rio de Janeiro/RJ','2222-3333','maria.oliv@email.com'),
('Carlos Souza', 'Rua XV de Novembro, 789 - Curitiba/PR','5555-4444', 'carlos.souza@email.com'),
('Ana Pereira', 'Travessa da Paz, 321 - Belo Horizonte/MG','6666-7777', 'ana.pereira@email.com'),
('Pedro Costa', 'Alameda Santos, 654 - Porto Alegre/RS','9999-8888', 'pedro.costa@email.com');


INSERT INTO usuario (nome_usuario, usuario, senha_usuario, nivel) VALUES
('Administrador', 'admin', MD5('senha123'), 1),
('Gerente', 'gerente', MD5('ger456'), 2),
('Operador', 'operador', MD5('op789'), 3),
('Visitante', 'visitante', MD5('visi012'), 4),
('Teste', 'teste', MD5('teste321'), 0);

drop table Cliente;