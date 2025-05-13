<?php
    require_once "conexao.php";

    $conexao = conectarBanco();
    $stmt = $conexao -> prepare("SELECT * FROM Cliente");
    $stmt->execute();
    $clientes = $stmt->fetchALL();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>E-mail</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= htmlspecialchars($cliente["id_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["nome_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["endereco_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["telefone_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["email_cliente"])?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>