<?php
require_once('connect.php');

$pontos = (isset($_POST['pontos']))?$_POST['pontos']:1;
$check = (isset($_POST['check']))?1:0;
$id = $_POST['id'];

$query = "UPDATE armasdefogo SET Pontos = '$pontos', Checado = '$check' WHERE ID = '$id' ";
$query_result = mysqli_query($conn, $query);

header("Location: index.php");