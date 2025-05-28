<?php
// Função para dimensionar a imagen
function redimensionarImagem($imagem, $largura, $altura){
    // obtém as dimensoes originais da imagem
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    // Cria uma nova imagem com as dimensões especificadas
    $novaImagem = imagecreatetruecolor($largura, $altura);

    // Cria uma nova imagem a partir do arquivo original(formato jpeg)
    $imagemOriginal = imagecreatefromjpeg($imagem);

    // Copia e redimensiona a imagem original para a nova imagem
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    // Inicia a saida em buffer para capturar os dados da imagem
    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean(); //Obtém os dados da imagem no buffer

    // Libera a memória usada pelas imagens
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem; //Retorna os dados a imagem redimensionada
}

// conexao com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try{

    // Cria uma nova instancia de PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro do pdo para exceções

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])){
        //Código abaixo verifica se não houve erro no upload da foto
        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];
            

            // Redimensiona a imagem para 300x400 pixels
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            // Prepara a instrução SQL para inserir os dados do funcionário no banco de dados
            $sql = "INSERT INTO funcionarios(nome, telefone, nome_foto, tipo_foto, foto) VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nomefoto);
            $stmt->bindParam(':tipo_foto', $tipofoto);
            // O Código abaixo define o parametroda foto como "large object(LOB)"
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);
            if($stmt->execute()){
                echo "Funcionário cadastrado com sucesso";
            } else {
                echo "Erro ao cadastrar o funcionário";
            }
        } else {
            echo "Erro ao fazer upload da foto!".$_FILES['foto']['error'];
        }
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
    <title>Lista Imagens</title>
</head>
<body>
    <h1>lista de Imagens</h1>
    <!-- Link para listar funcionários -->
     <a href="consulta_funcionario.php">Listar Funcionários</a>
</body>
</html>