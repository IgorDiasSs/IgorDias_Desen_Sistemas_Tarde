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
        echo "Cliente adicionado com sucesso<br>";
        echo "Clientes Cadastrados<hr>";
        
        $sql = "SELECT id_cliente, nome_cliente, email_cliente FROM Cliente";

        $result = $conexao->query($sql);
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
    }
    else {
        echo "ERRO ao adicionar cliente". $stmt->error;
    }

    $stmt->close();
    $conexao->close();
?>