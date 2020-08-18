<?php
session_start();
require_once('connect.php');

$nome = (isset($_POST['nome']))?$_POST['nome']:"indefinido";
$subNome = (isset($_POST['subNome']))?$_POST['subNome']:"";
$minimo = (isset($_POST['minimo']))?$_POST['minimo']:1;
$pontos = (isset($_POST['pontos']))?$_POST['pontos']:1;
$check = (isset($_POST['check']))?1:0;
$extra = (isset($_POST['extra']))?1:0;

if($pontos > 99){
    $pontos = 99;
}

if($minimo > 99){
    $minimo = 99;
}

if($pontos < $minimo){
    $pontos = $minimo;
}

if($minimo < 1){
    $minimo = 1;
}

$id = $_POST['id'];

$query = "UPDATE pericia SET Nome = '$nome', SubNome = '$subNome', Minimo = '$minimo', Pontos = '$pontos', Checado = '$check', extra = '$extra' WHERE ID = '$id'";
$query_result = mysqli_query($conn, $query);

$_SESSION['msg_success'] = "Pericia editada";
header("Location: index.php");