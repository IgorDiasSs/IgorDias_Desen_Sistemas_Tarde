<?php
    require_once "conexao.php";
    $conexao = conectarBanco();

    $idCliente = $_GET['id'] ?? null;
    $cliente = null;
    $msgErro = "";

    function buscarClientePorId($idCliente, $conexao){
        $stmt = $conexao->prepare("SELECT id_cliente, nome_cliente, endereco_cliente, telefone_cliente, email_cliente FROM Cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    if($idCliente && is_numeric($idCliente)){
        $cliente = buscarClientePorId($idCliente, $conexao);

        if(!$cliente){
            $msgErro = "Erro: Cliente não cadastrado";
        }
        else {
            $msgErro = "Digite o ID do Cliente para buscar os dados";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo){
            document.getElementById(campo).removeAttribute("readonly");
        }    
    </script>
</head>
<body>
    <?php if ($msgErro):?>
        <p style="color:red;"><?= htmlspecialchars($msgErro)?></p>
        <form action="atualizarCliente.php" method="GET">
            <label for="id">ID do Cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Buscar</button>
        </form>
    <?php else:?>
        <form action="processarAtualizacao.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente'])?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome_cliente'])?>" readonly onclick="habilitarEdicao('nome')">

            <label for="endereco">Endereco:</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente['endereco_cliente'])?>" readonly onclick="habilitarEdicao('endereco')">

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente['telefone_cliente'])?>" readonly onclick="habilitarEdicao('telefone')">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email_cliente'])?>" readonly onclick="habilitarEdicao('email')">

            <button type="submit">Atualizar Cliente</button>
        </form>
    <?php endif?>

</body>
</html>