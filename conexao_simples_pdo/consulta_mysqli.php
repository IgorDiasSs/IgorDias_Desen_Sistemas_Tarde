<?php

    // Definição das credenciais de acesso ao Banco de Dados

    $nomeServidor = "localhost"; //Endereço do Servidor MySQL
    $usuario = "root";          //Nome de usuário do banco
    $senha = "";                //Senha do Banco
    $bancoDeDados = "empresa";  //Nome do banco de dados

    //Criação da conexão MySQL
    $conn = mysqli_connect($nomeServidor, $usuario, $senha, $bancoDeDados);

    //Verificação da conexão

    if (!$conn){
        //Caso a conexão falhe, interrompe o script e exibe uma mensagem de erro
        die("Conexão Falhou: ". mysqli_connect_error());
    }
    // Configuração do conjunto de caracteres para evitar de acentuação
    mysqli_set_charset($conn, "utf8mb4");

    //Mensagem indicando que a conexão foi estabelecida corretamente
    echo "Conexão bem-sucedida";

    //Consulta SQL para obter clientes
    $sql = "SELECT id_cliente, nome_cliente, email_cliente FROM Cliente";
    $result = mysqli_query($conn, $sql);

    //Verifica se há resultados na consulta
    if (mysqli_num_rows($result) > 0){
        //itera sobre os resultados e exive dados
        while ($linha = mysqli_fetch_assoc($result)){
            echo "<br>ID:". $linha["id_cliente"]. "- Nome: ". $linha["nome_cliente"]. " - Email: ".$linha["email_cliente"]. "<br>";
        }
    }
    else {
        echo "Nenhum resultado encontrado";
    }
    
    mysqli_close($conn);

?>