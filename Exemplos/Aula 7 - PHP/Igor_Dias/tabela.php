<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazendo Matrizes</title>
    <style type="text/css">
        table {
            border-collapse:collapse;
        }
        th, td {
            border-style: solid;
            width: 50px;
        }
    </style>
</head>
<body>
    <h3>Igor da Silva Dias</h3>
    <table>
    <?php
        for ($i = 1; $i<=5; $i++){
            echo "<tr>";
            for ($c=1; $c <=20; $c++){
                echo "<td> $i,$c </td>";
            }
            echo "</tr>";
        }
    ?>
</body>
</html>