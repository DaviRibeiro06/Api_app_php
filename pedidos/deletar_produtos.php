<?php
    include_once("../conexao.php");

    $deletar = $_GET['usuario'] ?? '';


    $sql = "DELETE FROM produtos WHERE produto_id = $deletar";
    $result = $pdo->prepare($sql);
    $result->execute();
    echo "<script>alert('Item deletado com sucesso!'); location.href='../pages/produtos_cadastrados.php'; </script>";
?>