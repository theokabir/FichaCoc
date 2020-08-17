<?php
require_once('connect.php');

$life = $_GET['life'];

$lifeAtual = $life - 1;

$query = "UPDATE personagem SET vidaatual = '$lifeAtual' WHERE id = '1'";
$result = mysqli_query($conn, $query);

header("Location: index.php");