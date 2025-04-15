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
        $name = "Igor da Silva";
        echo $name."<br>";
        $length = strlen($name);
        echo $length."<br>";
        $cmp = strcmp($name, "Brian le");
        echo $cmp."<br>";
        $index = strpos($name, "i");
        echo $index."<br>";
        $first = substr($name, 9, 5);
        echo $first."<br>";
        $name = strtoupper($name);
        echo $name."<br>";
    ?>
    <?php
        $cidade = "Joinville";
        $estado = "SC";
        $idade = 174;
        $frase_capital = "A cidade de $cidade é a maior cidade de $estado";
        $frase_idade = "$cidade tem mais de $idade anos";
        echo "<h3>$frase_capital";
        echo "<h4>$frase_idade";
    ?>
</body>
</html>