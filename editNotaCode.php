<?php
session_start();
require_once('connect.php');

$id = 1;
$nota = (isset($_POST['note']))?$_POST['note']:"insira anotações aqui";

$query = "UPDATE nota SET NotaText = '$nota' WHERE id = '1'";
$result = mysqli_query($conn, $query);

$_SESSION['msg_success_nota'] = "Nota editada";
header("location: index.php#notas");