<?php
require_once('connect.php');

$pontos = (isset($_POST['pontos']))?$_POST['pontos']:1;
$check = (isset($_POST['check']))?1:0;
$id = $_POST['id'];

$query2 = "SELECT * FROM armasdefogo WHERE ID = '$id'";
$result_query2 = mysqli_query($conn, $query2);
$arma = mysqli_fetch_assoc($result_query2);

if($pontos < $arma['Minimo']){
    $pontos = $arma['Minimo'];
}

if($pontos > 99){
    $pontos = 99;
}

$query = "UPDATE armasdefogo SET Pontos = '$pontos', Checado = '$check' WHERE ID = '$id' ";
$query_result = mysqli_query($conn, $query);

header("Location: index.php");