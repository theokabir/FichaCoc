<?php
session_start();
require_once('connect.php');

$nome = (isset($_POST['nome']))?$_POST['nome']:"indefinido";
$subNome = (isset($_POST['subNome']))?$_POST['subNome']:"";
$minimo = (isset($_POST['minimo']))?$_POST['minimo']:1;
$pontos = (isset($_POST['pontos']))?$_POST['pontos']:1;
$extra = (isset($_POST['extra']))?1:0;

$query = "INSERT INTO pericia(Nome, SubNome, Minimo, Pontos, extra) VALUES ('$nome', '$subNome', '$minimo', '$pontos', '$extra')";
$query_result = mysqli_query($conn, $query);

$_SESSION['msg_success'] = "Pericia criada";
header("Location: index.php");