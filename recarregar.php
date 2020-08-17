<?php
require_once('connect.php');

$id = $_GET['id'];

$query = "SELECT * FROM armas WHERE ID = '$id'";
$result = mysqli_query($conn, $query);
$arma = mysqli_fetch_assoc($result);

$municiado = $arma['BalasCarregadas'];
$total = $arma['BalasTotal'];
$pente = $arma['Pente'];

$municiar = ($total < $pente)?$total:$pente;

if($total <= 0){
    header("Location: index.php#armas");
}else{

    $query2 = "UPDATE armas SET BalasCarregadas = '$municiar'  WHERE ID = '$id'";
    $result = mysqli_query($conn, $query2);

    header("Location: index.php#armas");

}