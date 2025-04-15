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
        for ($i = 0; $i < 10; $i++){
            print "O quadrado de $i é ". $i*$i."<br>";
        }

        echo "<hr>";

        for($i = 2; $n = system('dir /b'); $i++){
            echo ($n)."<br>";
            if ($i == 10) {
                break;
            }
        }
    ?>
</body>
</html>