<?php
session_start();
require_once('connect.php');
$id = $_GET['id'];

$query1 = "SELECT * FROM item WHERE ID = '$id'";
$result_query1 = mysqli_query($conn, $query1);
$item = mysqli_fetch_assoc($result_query1);
$nome = $item['Nome'];

$qtd = $item['Quantidade'];

$nextQtd = $qtd - 1;

if($nextQtd < 0){
    $_SESSION['msg_danger_item'] = "O item <strong>$nome</strong> Acabou";
    header("Location: index.php#itens");
}else{
    if($nextQtd == 0){
        $_SESSION['msg_danger_item'] = "o item <strong>$nome</strong> Acabou";
    }

    $query2 = "UPDATE item SET Quantidade = '$nextQtd' WHERE ID = '$id'";
    $resultQuery2 = mysqli_query($conn, $query2);
    header("Location: index.php#itens");

}