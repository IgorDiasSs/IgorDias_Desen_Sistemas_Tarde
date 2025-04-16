<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando Foreach</title>
</head>
<body>
    <h3>Igor da Silva Dias</h3>
    <?php
        $cores = array("Amarelo", "Vermelho", "Verde", "Azul");
        foreach($cores as $cor) {
            echo $cor."<br>";
        }
    ?>
</body>
</html>