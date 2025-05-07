<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once "conexao.php";
    //Estabelece Conexão
    $conexao = conectadb();
    $id_cliente = 4;

    $stmt = $conexao->prepare("DELETE FROM Cliente WHERE id_cliente = ?");

    $stmt->bind_param("i",$id_cliente);

    if ($stmt->execute()){
        echo "Cliente deletado com sucesso";
    }
    else {
        echo "ERRO ao Deletar cliente". $stmt->error;
    }

      
    $sql = "SELECT id_cliente, nome_cliente ,endereco_cliente, telefone_cliente, email_cliente FROM Cliente";

    $result = $conexao->query($sql);
    if ($result->num_rows > 0){
        while ($linha = $result->fetch_assoc()){
            if ($linha["id_cliente"] == $id_cliente) {
                echo "<br>ID:". $linha["id_cliente"]. "- Nome: ". $linha["nome_cliente"]. "- Endereço: ". $linha["endereco_cliente"] . "- Telefone: ". $linha["telefone_cliente"] . " - Email: ".$linha["email_cliente"]." (Alterado Recentemente) ". "<br>";
            }
            else{
                echo "<br>ID:". $linha["id_cliente"]. "- Nome: ". $linha["nome_cliente"]. "- Endereço: ". $linha["endereco_cliente"] . "- Telefone: ". $linha["telefone_cliente"] . " - Email: ".$linha["email_cliente"]. "<br>";
            }
        }
    }
    else {
        //Caso nenhum resultado seja encontrado
        echo "Nenhum Cliente Cadastrado.";
    }
?>