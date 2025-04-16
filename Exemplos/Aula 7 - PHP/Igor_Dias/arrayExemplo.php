<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <h3>Igor da Silva Dias</h3>
    <?php
    // rand - Gera um número inteiro aleatório
        $sorteio = rand(0, 5);
        echo "Sorteado: $sorteio <hr>";
    // array_merge - Combina um ou mais arrays
    // range - Cria um array contendo uma faixa de elementos
    // (Inicio, fim, passo)

        $vetor = array_merge( range(0, 10),
        range($sorteio, 10, 2),
        array($sorteio)
        );
        

        print_r($vetor);
        echo "<hr>";
        // embaralha    
        shuffle($vetor);
        print_r($vetor);
        echo "<hr>";
        foreach ($vetor as $valor){
            echo 'O valor ', $valor, '  tem 3 elementos. <br>';
        }
    ?>
</body>
</html>