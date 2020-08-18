<?php
session_start();
require_once('connect.php');

$id = $_GET['id'];

$query = "DELETE FROM fobia WHERE ID = '$id'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_danger_fobia'] = "Fobia deletada";
header("Location: index.php#fobias");