<?php
session_start();
require_once('connect.php');

$nome = $_POST['nome'];
$dano = $_POST['Dano'];
$id = $_POST['id'];
$pente = (isset($_POST['pente']))?$_POST['pente']:"indefinido";
$balasCarregadas = (isset($_POST['balasCarregadas']))?$_POST['balasCarregadas']:"indefinido";
$balasTotal = (isset($_POST['balasTotal']))?$_POST['balasTotal']:"indefinido";

$query = "UPDATE armas SET Nome = '$nome', Dano = '$dano', Pente = '$pente', BalasCarregadas = '$balasCarregadas', BalasTotal = '$balasTotal' WHERE ID = '$id'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_arma'] = "Arma editada";
header("Location: index.php#armas");