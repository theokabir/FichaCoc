<?php
session_start();
require_once('connect.php');

$id = $_GET['id'];

$query = "DELETE FROM item WHERE ID = '$id'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_danger_item'] = "item deletado";
header("Location: index.php#itens");