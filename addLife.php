<?php
require_once('connect.php');

$query_veri = "SELECT * FROM personagem";
$query_veri_result = mysqli_query($query_veri);

$personagem = mysqli_fetch_assoc($query_veri_result);

$life = $_GET['life'];

$lifeAtual = $life + 1;

$query = "UPDATE personagem SET vidaatual = '$lifeAtual' WHERE id = '1'";
$result = mysqli_query($conn, $query);

header("Location: index.php");