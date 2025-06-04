<?php
// login.php
require_once 'config.php';

if(isset($_SESSION['usuario_id'])){
    header('Location: dashboard.php');
    exit;
}

$erro = "";

//Processa o formulário de login
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if(!empty($email) && !empty($senha)){
        $pdo = conectarBanco();

        // Busca usuário pelo email
        $stmt = $pdo->prepare("SELECT id_usuario, nome, senha FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verifica a senha
        if($usuario && password_verify($senha, $usuario['senha'])){
            // Cria sessão
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_senha'] = $usuario['senha'];


            header("Location: dashboard.php");
            exit;
        } else {
            $erro = "Credenciais Inválidas!";
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{font-family:Arial, sans-serif;}
        .container{width: 300px; margin:100px auto;}
        input{width: 100%; padding:8px; margin:5px 0;}
        button{padding: 10px; background:#007BFF; color:white; border:none; width:100%;}
        .error{color:red;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if($erro): ?>
            <p class="error"><?= $erro; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>