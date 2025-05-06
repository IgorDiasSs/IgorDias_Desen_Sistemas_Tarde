<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once "conexao.php";
    //Estabelece Conexão
    $conexao = conectadb();
    $id_cliente = 2;

    $stmt = $conexao->prepare("DELETE FROM Cliente WHERE id_cliente = ?");

    $stmt->bind_param("i",$id_cliente);

    if ($stmt->execute()){
        echo "Cliente deletado com sucesso";
    }
    else {
        echo "ERRO ao Deletar cliente". $stmt->error;
    }
?>