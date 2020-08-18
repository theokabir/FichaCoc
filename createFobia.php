<?php
session_start();
require_once('connect.php');

$nome = (isset($_POST['nome']))?$_POST['nome']: "Indefinido";
$desc = (isset($_POST['desc']))?$_POST['desc']: "Indefinido";
$check = (isset($_POST['check']))?1:0;


$query = "INSERT INTO fobia() VALUES (default, '$nome', '$desc', '$check') ";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_fobia'] = "Fobia criada";
header("Location: index.php#fobias");