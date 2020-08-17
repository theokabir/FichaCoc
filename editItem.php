<?php
session_start();
require_once('connect.php');

$id = $_POST['id'];
$nome = (isset($_POST['nome']))?$_POST['nome']:"indefinido";
$qtd = (isset($_POST['qtd']))?$_POST['qtd']:"indefinido";
$desc = (isset($_POST['desc']))?$_POST['desc']:"indefinido";

$query = "UPDATE item SET Nome = '$nome', Quantidade = '$qtd', Descricao = '$desc' WHERE ID = '$id'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_item'] = "Item editado";
header("Location: index.php#itens");