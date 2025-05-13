<?php 
require_once 'conexao.php';

$conexao = conectarBanco();

$sql = "SELECT id_cliente, nome_cliente, endereco_cliente, telefone_cliente, email_cliente FROM cliente ORDER BY nome_cliente ASC";
$stmt = $conexao -> prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchALL();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h2>Todos os Clientes cadastrados</h2>
    <?php if (!$clientes): ?>
        <p style="color:red;">Nenhum cliente encontrado no banco de dados</p>
    <?php else: ?>    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= htmlspecialchars($cliente["id_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["nome_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["endereco_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["telefone_cliente"])?></td>
            <td><?= htmlspecialchars($cliente["email_cliente"])?></td>
            <td>
                <a href="atualizarCliente.php?id=<?=$cliente['id_cliente']?>">Editar</a>
        </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</body>
</html>