<?php
// conexao com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try{

    // Cria uma nova instancia de PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro do pdo para exceções


    // RECUPERA TODOS OS FUNCIONARIOS DO BANCO DE DADOS

    $sql = "SELECT id,nome FROM funcionarios";
    $stmt = $pdo->prepare($sql); //prepara a instrução sql para execução
    $stmt->execute(); //Executa a instrução;
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //BUSCA TODO OS RESULTADOS COM UMA MATRIZ ASSOCIATIVA

    //Verifica de foi solicitado a exclusão de um formulário

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir_id'])){
        //Código abaixo verifica se não houve erro no upload da foto
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt_excluir->execute();

        //redireciona para evitar o reenvio de formulário
        header("Location: ". $_SERVER['PHP_SELF']);
        exit();
    }
} catch(PDOException $e){
    echo "ERR0 ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Funcionário</title>
    <link rel="stylesheet" href="./css/other-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
        <div class="fixed-top d-flex justify-content-start p-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Navegar
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">Home</a></li>
                <li><a class="dropdown-item" href="cadastro_funcionario.php">Cadastrar</a></li>
                <li><a class="dropdown-item" href="consulta_funcionario.php">Consultar</a></li>
            </ul>
        </div>
    <h1>Lista de Funcionários</h1>
    <ul>
        <?php if(empty($funcionarios)): ?>
            <p>Não há funcionários Registrados</p>
        <?php else: ?>
            <?php foreach($funcionarios as $funcionario): ?>
                <li>
                    <a href="visualizar_funcionario.php?id=<?= $funcionario['id']?>">
                        <?= htmlspecialchars($funcionario['nome']) ?>
                    </a>
                <form  method="POST">
                    <input class="funcs" type="hidden" name="excluir_id" value="<?= $funcionario['id']?>">
                    <button class="excluir" type="submit">Excluir</button>
                </form>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

</body>
</html>