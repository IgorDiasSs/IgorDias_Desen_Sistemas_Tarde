<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once "conexao.php";
    //Estabelece Conexão
    $conexao = conectadb();

    //Definição dos valores para inserção
    $nome = "Igor da Silva Dias";
    $endereco = "Avenida Marquês de Olinda, 96";
    $telefone = "(47) 9676-5488";
    $email = "igor_s_dias@estudante.sesisenai.org.br";

    // Prepara a consulta SQL usando 'prepare()' para evitar SQL Injection

    $stmt = $conexao->prepare("INSERT INTO Cliente (nome_cliente, endereco_cliente,telefone_cliente, email_cliente) VALUES(?,?,?,?);");
    $stmt->bind_param("ssss",$nome, $endereco,$telefone, $email);

    if ($stmt->execute()){
        echo "Cliente adicionado com sucesso";
        
    }
    else {
        echo "ERRO ao adicionar cliente". $stmt->error;
    }

    $stmt->close();
    $conexao->close();
?>