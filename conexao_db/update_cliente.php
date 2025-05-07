<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once "conexao.php";
    //Estabelece Conexão
    $conexao = conectadb();

    //Define os novos valores, 
    $nome = "Maria da Silva"; //substitui Maria Oliveira
    $endereco = "Rua Kalamango, 32"; // Substitui Avenida Brasil, 456 - Rio de Janeiro/RJ'
    $telefone = "(41) 5555-5555"; // Substitui  2222-3333
    $email = "mariaSilva@teste.com"; // Substitui maria.oliv@email.com

    $id_cliente = 2;
    

    //Prepara a consulta SQL segura
    $stmt = $conexao->prepare("UPDATE Cliente SET nome_cliente = ?, endereco_cliente = ?, telefone_cliente = ?, email_cliente = ? WHERE id_cliente = ?");

    $stmt->bind_param("ssssi", $nome, $endereco,$telefone, $email, $id_cliente);

    if ($stmt->execute()){
        echo "Cliente Atualizado com sucesso<br> ";      
    }
    else {
        echo "ERRO ao Atualizar cliente ". $stmt->error;
    }

    $stmt->close();
    $conexao->close();
?>