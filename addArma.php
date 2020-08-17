<?php
session_start();
require_once('connect.php');

$nome = $_POST['nome'];
$dano = $_POST['Dano'];
$pente = (isset($_POST['pente']))?$_POST['pente']:0;
$balasCarregadas = (isset($_POST['balasCarregadas']))?$_POST['balasCarregadas']:0;
$balasTotal = (isset($_POST['balasTotal']))?$_POST['balasTotal']:0;

$query = "INSERT INTO armas() VALUES(default, '$nome', '$dano', '$balasTotal', '$balasCarregadas', '$pente')";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_arma'] = "Arma criada";
header("Location: index.php#armas");