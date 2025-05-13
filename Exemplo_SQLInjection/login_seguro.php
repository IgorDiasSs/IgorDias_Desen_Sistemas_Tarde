<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "empresa_teste";

$conexao = new mysqli($server, $user, $password, $db);
if($conexao->connect_error) {
    die("ERRO de Conexão: " . $conexao->connect_error);
}
$nome = trim($_POST["nome"]);

// Prepara comando seguro
$stmt = $conexao->prepare("SELECT * FROM Cliente_teste WHERE nome = ?");
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    header("Location: area_restrita.php");
    exit();
}
else {
    echo "Nome não encontrado";
}
$conexao->close();
?>