<?php

// DEFINIÇÃO DAS CREDENCIAIS DE CONEXÃO AO BANCO DE DADOS
$servername = "localhost";
$username = "root";
$password = "";
$db = "armazena_imagem";

// Criando a conexão usando MYSQLI

$conexao = new mysqli($servername, $username, $password, $db);

// Verificando se houve erro na conexão

if($conexao->connect_error){
    die("Falha na conexão: ".$conexao->connect_error);
    
}

?>