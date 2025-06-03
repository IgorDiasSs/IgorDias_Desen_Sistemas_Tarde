<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Cadastro</title>
    <link rel="stylesheet" href="other-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
        <div class="d-flex justify-content-end p-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Navegar
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cadastro_funcionario.php">Cadastrar</a></li>
                <li><a class="dropdown-item" href="consulta_funcionario.php">Consultar</a></li>
                <li><a class="dropdown-item" href="visualizar_funcionario.php">Visualizar</a></li>
            </ul>
        </div>

    <div class="other-bg">
    <div class="container">
        <h1>Cadastro</h1>
        <p>Funcionário</h2>
        <!-- FORMULÁRIO PARA CADASTRAR FUNCIONÁRIO -->
         <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
            <!-- CAMPO PARA INSERIR O NOME DO USUÁRIO -->
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>
            <!-- CAMPO PARA INSERIR O Telefone DO USUÁRIO -->
            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" required>
            <!-- CAMPO PARA fazer o UPLOAD da foto do funcionario -->
            <label for="foto">Foto: </label>
            <input type="file" name="foto" id="foto" required>
            <!-- botão para enviar o formulário -->
            <button type="submit" name="telefone" id="telefone" required>Cadastrar</button>
         </form>
    </div>
    </div>
</body>
</html>