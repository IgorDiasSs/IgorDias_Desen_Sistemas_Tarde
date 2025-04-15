<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções PHP</title>
</head>
<body>
    <h3>Igor da Silva Dias</h3>
    <?php
        $dias = array('domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado');
        echo $dias[1]."<br>";
        print_r($dias);
        echo "<br>";
        var_dump($dias);
        // var_dump($_SERVER);
    ?>
</body>
</html>