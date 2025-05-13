<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "empresa_teste";

// Conexão usando MYSQLI sem proteção contra SQL Injection
$conexao = new mysqli($server, $user, $password, $db);
// Verifica erro
if($conexao->connect_error) {
    die("ERRO de Conexão: " . $conexao->connect_error);
}
// captura dados do formulário
$nome = $_POST["nome"];

// Executa consulta sem proteção contra SQL Injection

$sql = "SELECT * FROM cliente_teste WHERE nome = '$nome'";
$result = $conexao->query($sql);

// Se houver resultados, o login é considerado bem-sucedido
if($result->num_rows > 0) {
    header("Location: area_restrita.php");
    // Garante que o código pare aqui para evitar execução indevida
    exit();
}
else {
    echo "Nome não encontrado";
}
//fecha conexão
$conexao->close();
?>