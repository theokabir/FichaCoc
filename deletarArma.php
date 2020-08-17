<?php
session_start();
require_once('connect.php');

$id = $_GET['id'];

$query = "DELETE FROM armas WHERE ID = '$id'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_danger_arma'] = "Arma deletada";
header("Location: index.php#armas");