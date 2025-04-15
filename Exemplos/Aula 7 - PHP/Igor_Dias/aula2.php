<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinação com HTML</title>
</head>
<body>
    <h3>Igor da Silva Dias</h3><br>
    <?php
        // Função Usada para definir fuso horário padrão
        date_default_timezone_set("America/Sao_Paulo");
        //Manipulando HTML e PHP
        $data_hoje = date("d/m/Y-h:i:sa");
    ?>
    <p align="center">Hoje é Dia <?php echo $data_hoje; ?></p>

    <?php
        echo "texto ";
        echo "Hello World ";
        echo  "Isso abrange
        várias linhas. As novas linhas serão saída também. ";
        echo "Isso abrange  <br> multiplas linhas. A nova linha será  <br> a saída também.<br>";
        echo "Caracteres Escaping são feitos \"Como esse\".<br>";
    ?>
<hr>
    <?php
        $comida_favorita = "Italiana";
        print $comida_favorita[2];
        $comida_favorita = "Cozinha ". $comida_favorita;
        echo "<br>";
        print $comida_favorita; 
    ?>
</body>
</html>