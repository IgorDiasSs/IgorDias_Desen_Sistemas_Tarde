<?php

require_once 'conecta.php';

// Obtem o ID da Imagem da URL, GARANTINDO QUE SEJA UM NUMERO INTEIRO
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

//Verifica se o ID é válido (maior que zero)

if($id_imagem > 0){
    // cria a query segura usando o prepared statement
    $queryExclusao = "DELETE FROM tabela_imagem WHERE codigo = ? ";
    //prepara a query
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i", $id_imagem); //DEFINE O ID COMO UM INTEIRO

    // EXECUTA A EXCLUSAO
    if($stmt->execute()){
        echo "Imagem excluida com sucesso!!!!!!!!";
    }
    else {
        die("ERR0 ao excluir a imagem" . $stmt->error);
    }
    // fecha a consulta
    $stmt->close();
} else {
echo "ID Inválido";

// redireciona para o index.php e garante que o script pare
header("Location: index.php");
exit();

}

?>