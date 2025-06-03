<?php
// Função para dimensionar a imagem (apenas JPEG)
function redimensionarImagem($imagem, $largura, $altura){
    // obtém as dimensões e o tipo da imagem
    $info = getimagesize($imagem);
    if ($info === false || $info[2] !== IMAGETYPE_JPEG) {
        // não é uma imagem JPEG válida
        return false;
    }

    list($larguraOriginal, $alturaOriginal) = $info;

    // cria uma nova imagem com as dimensões desejadas
    $novaImagem = imagecreatetruecolor($largura, $altura);

    // cria a imagem original a partir do arquivo JPEG
    $imagemOriginal = imagecreatefromjpeg($imagem);
    if (!$imagemOriginal) {
        return false;
    }

    // redimensiona a imagem original para a nova imagem
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    // captura a saída da imagem redimensionada no buffer
    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean();

    // libera memória
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem;
}

// conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try{
    // cria nova conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])){
        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

            // redimensiona a imagem
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);
            if ($foto === false) {
                echo "Erro: Apenas imagens JPEG são aceitas.";
                exit;
            }

            // prepara a query
            $sql = "INSERT INTO funcionarios(nome, telefone, nome_foto, tipo_foto, foto) VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nomeFoto);
            $stmt->bindParam(':tipo_foto', $tipoFoto);
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

            if($stmt->execute()){
                echo "Funcionário cadastrado com sucesso";
            } else {
                echo "Erro ao cadastrar o funcionário";
            }
        } else {
            echo "Erro ao fazer upload da foto! Código: " . $_FILES['foto']['error'];
        }
    }
} catch(PDOException $e){
    echo "Erro: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista Imagens</title>
</head>
<body>
    <h1>Lista de Imagens</h1>
    <a href="consulta_funcionario.php">Listar Funcionários</a>
</body>
</html>
