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
        for ($i = 0; $i<=10; $i++){
            echo "<tr>";
            if($i==0){
                echo "<td align=center>x</td>"; 
            } 
            else{
                echo "<td> ".$i ."</td>";
            }
            for ($c=0; $c <=9; $c++){
                if($i==0){
                    echo "<td> ".$c ."</td>";                }
                else{
                    echo "<td> ".$i*$c ."</td>";

                }
            }
            echo "</tr>";
        }
    ?>
</body>
</html>