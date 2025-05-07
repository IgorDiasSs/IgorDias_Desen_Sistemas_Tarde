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
        echo " Clientes Cadastrados<hr>";
      
    }
    else {
        echo "ERRO ao Atualizar cliente ". $stmt->error;
    }

      
    $sql = "SELECT id_cliente, nome_cliente ,endereco_cliente, telefone_cliente, email_cliente FROM Cliente";

    $result = $conexao->query($sql);
    if ($result->num_rows > 0){
        //itera sobre os resultados e exive dados
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

    $stmt->close();
    $conexao->close();
?>