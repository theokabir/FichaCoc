<?php
require_once('connect.php');

$life = $_GET['san'];

$lifeAtual = $life + 1;

if($lifeAtual > 99){
    header("Location: index.php");
}else{
    $query = "UPDATE personagem SET sanidade = '$lifeAtual' WHERE id = '1'";
    $result = mysqli_query($conn, $query);

    header("Location: index.php");
}