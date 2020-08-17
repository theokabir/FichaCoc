<?php
session_start();
require_once('connect.php');
$id = $_GET['id'];

$query ="DELETE FROM pericia WHERE ID = '$id'";
$query_result = mysqli_query($conn, $query);

$_SESSION['msg_danger'] = "Pericia deletada";
header("Location: index.php");