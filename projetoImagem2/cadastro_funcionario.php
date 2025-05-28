<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <h2>Funcionário</h2>
        <!-- FORMULÁRIO PARA CADASTRAR FUNCIONÁRIO -->
         <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
            <!-- CAMPO PARA INSERIR O NOME DO USUÁRIO -->
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>
            <br>
            <!-- CAMPO PARA INSERIR O Telefone DO USUÁRIO -->
            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" required>
            <br>
            <!-- CAMPO PARA fazer o UPLOAD da foto do funcionario -->
            <label for="foto">Foto: </label>
            <input type="file" name="foto" id="foto" required>
            <br>
            <!-- botão para enviar o formulário -->
            <button type="submit" name="telefone" id="telefone" required>Cadastrar</button>
         </form>
    </div>
</body>
</html>