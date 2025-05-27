CREATE DATABASE IF NOT EXISTS armazena_imagem;
use armazena_imagem;
ALTER TABLE tabela_imagem
DROP COLUMN descrição;
ALTER TABLE tabela_imagem 
ADD descricao varchar(255);

ALTER TABLE tabela_imagem
modify codigo int auto_increment;