<?php
session_start();
require_once('connect.php');

$id = $_POST['id'];
$nome = (isset($_POST['nome']))?$_POST['nome']:"Indefinido";
$desc = (isset($_POST['desc']))?$_POST['desc']:"Indefinido";
$check = (isset($_POST['check']))?1:0;

$query = "UPDATE fobia SET Nome = '$nome', Descricao = '$desc', Checado = '$check' WHERE ID = '$id'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_fobia'] = "Fobia editada";

header("Location: index.php#fobias");

