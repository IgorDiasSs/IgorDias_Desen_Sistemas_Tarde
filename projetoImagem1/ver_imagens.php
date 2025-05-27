<?php


    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ob_clean(); // LIMPA QUALQUER SAIDA INESPERADA ANTES DO HEADER
     
    // Conexao com o banco de dados
    require_once 'conecta.php';

    // Obtem o ID da Imagem da URL, GARANTINDO QUE SEJA UM NUMERO INTEIRO
    $id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // cria consulta para buscar a imagem no banco de dados
    $querySelecionaPorCodigo = "SELECT imagem, tipo_imagem FROM tabela_imagem WHERE codigo = ? ";

    // usa prepared statement para maior segurança
    $stmt = $conexao->prepare($querySelecionaPorCodigo);
    $stmt->bind_param("i", $id_imagem);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // VERIFICA SE A IMAGEM EXISTE NO BANCO DE DADOS
    if($resultado->num_rows > 0){
        $imagem = $resultado->fetch_object();
        // Define  o tipo correto da imagem da imagem(fallback para JPEG caso esteja vazio)
        $tipoImagem = !empty($imagem->tipo_imagem) ? $imagem->tipo_imagem : "imagem/jpeg";
        header("Content-type: " . $tipoImagem);

        // Exibe imagem armazenada no banco de dados;
        echo $imagem->imagem;
    } else {
        echo "Imagem não encontrada.";
    }
    // fecha a consulta
    $stmt->close();

    
?>