<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * Função para conectar ao banco de dados
 * Retorna um objeto de conexão MySQLI ou interrompe o script em caso de erro.
 */
function conectadb(){
    //Configuração do Banco de Dados
    $address = "localhost";
    $user = "root";
    $password = "";
    $db = "empresa";

    try {
        //Criação da conexão
        $con = new mysqli($address, $user, $password, $db);

        $con -> set_charset("utf8mb4");
        return $con;
    }
    catch (Exception $e){
        //Exibe Mensagemde erro e encerra o script mysql
        die("Erro na Conexão". $e -> getMessage());
    }
}

?>