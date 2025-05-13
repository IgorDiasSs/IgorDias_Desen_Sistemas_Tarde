<?php

    function conectarBanco(){
        $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8";
        $user = "root";
        $password = "";

        try {
            $conexao = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            
            return $conexao;
        }
        catch (PDOException $e){
            error_log("ERRO ao Conectar ao Banco:". $e -> getMessage());
            die("Erro ao conectar o Banco");
        }
    }
    
?>