<?php
session_start();
require_once('connect.php');

$nome = (isset($_POST['nome']))?$_POST['nome']:"indefinido";
$qtd = (isset($_POST['qtd']))?$_POST['qtd']:"indefinido";
$desc = (isset($_POST['desc']))?$_POST['desc']:"indefinido";

$query = "INSERT INTO item () VALUES (default, '$nome', '$qtd', '$desc')";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_item'] = "Item adicionado";
header("Location: index.php#itens");