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
        $umidade = 91;
        $vaiChover = ($umidade < 90);
        if ($vaiChover) {
            echo "Vai chover com toda certeza absoluta da terra! ";
        }
    ?>
    <hr>
    <?php
        $a = 17;
        if ($a > 17){
            print "Maior de idade.<br>";
        }
        else {
            print "Menor de idade.<br>";
        }
    ?>
</body>
</html>