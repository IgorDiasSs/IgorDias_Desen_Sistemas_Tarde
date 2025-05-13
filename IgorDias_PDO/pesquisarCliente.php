<?php

    require_once 'conexao.php';

    $conexao = conectarBanco();

    $busca = $_GET['busca'] ?? '';

    if(!$busca) {
        ?>
        <form action="pesquisarCliente.php" method="GET">
            <label for="busca"> Digite o ID ou Nome:</label>
            <input type="text" id="busca" name="busca" required>
            <button type="submit">Pesquisar</button>
        </form>
        <?php
        exit;
    }
    if(is_numeric($busca)) {
        $stmt = $conexao->prepare("SELECT id_cliente, nome_cliente, endereco_cliente, telefone_cliente, email_cliente FROM Cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $busca, PDO::PARAM_INT);
    }else {
        $stmt = $conexao->prepare("SELECT id_cliente, nome_cliente, endereco_cliente, telefone_cliente, email_cliente FROM Cliente WHERE nome_cliente LIKE :nome");
        $buscaNome = "%$busca%";
        $stmt->bindParam(":nome", $buscaNome, PDO::PARAM_STR);
    }
    $stmt->execute();
    $clientes = $stmt->fetchAll();

    if(!$clientes) {
        die("ERRO: Nenhum cliente encontrado");
    }
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ação</th>
    </tr>
    <?php foreach ($clientes as $cliente){ ?>
    <tr>
        <td><?=htmlspecialchars($cliente['id_cliente'])?></td>
        <td><?=htmlspecialchars($cliente['nome_cliente'])?></td>
        <td><?=htmlspecialchars($cliente['endereco_cliente'])?></td>
        <td><?=htmlspecialchars($cliente['telefone_cliente'])?></td>
        <td><?=htmlspecialchars($cliente['email_cliente'])?></td>
        <td>
            <a href="atualizarCliente.php?id=<?=$cliente['id_cliente']?>">Editar</a>
        </td>
    </tr>
    <?php } ?>
</table>