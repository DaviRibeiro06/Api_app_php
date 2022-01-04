<?php
include_once("../conexao.php");

$deletar = $_GET['deletar'];

$sql = "DELETE FROM pedidos WHERE ID_PEDIDOS = :ID_PEDIDOS";
$id = $deletar;
$result = $pdo->prepare($sql);
$result->execute(array(":ID_PEDIDOS"=>$id));

if($result){
    header("location: ../pages/pedidos.php");
}
?>