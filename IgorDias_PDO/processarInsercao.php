<?php
    require_once "conexao.php";
    $conexao = conectarBanco();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //ta dando erro
        $sql = "INSERT INTO Cliente (nome, endereco, telefone, email) VALUES(:nome, :endereco, :telefone, :email);";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $_POST["nome"]);
        $stmt->bindParam(":endereco", $_POST["endereco"]);
        $stmt->bindParam(":telefone", $_POST["telefone"]);
        $stmt->bindParam(":email", $_POST["email"]);
        try {
            $stmt->execute();
            echo "Cliente Cadastrado com Sucesso!";
        }
        catch (PDOException $e){
            error_log("Erro ao inserir cliente: ". $e->getMessage());
            echo "Erro ao Cadastrar Cliente.";
        }
    }

?>