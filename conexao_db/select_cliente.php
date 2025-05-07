<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once "conexao.php";

    $conexao = conectadb();

    $sql = "SELECT id_cliente, nome_cliente, email_cliente FROM Cliente";

    $result = $conexao->query($sql);
    //Verifica se há resultados na consulta
    echo "Clientes Cadastrados";
    if ($result->num_rows > 0){
        //itera sobre os resultados e exive dados
        while ($linha = $result->fetch_assoc()){
            echo "<br>ID:". $linha["id_cliente"]. "- Nome: ". $linha["nome_cliente"]. " - Email: ".$linha["email_cliente"]. "<br>";
        }
    }
    else {
        //Caso nenhum resultado seja encontrado
        echo "Nenhum Cliente Cadastrado.";
    }
    $conexao->close();

?>