<?php

    require_once 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexao = conectarBanco();

        $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);

        if(!$id) {
            die("ERRO: ID inválido");
        }

        $sql = "DELETE FROM cliente WHERE id_cliente = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
            echo "Cliente excluido com sucesso!";
        } catch (PDOException $e) {
            error_log("ERRO ao excluir cliente:" . $e->getMessage());
            echo "ERRO ao excluir cliente";
        }

    }



?>