<?php

session_start();
ob_start();

include_once("../config.php");

$id_temporario = $_SESSION['id'];

$sql14 = "SELECT * FROM T_usuario WHERE idT_usuario = $id_temporario";
$prepare14 = $dbh->prepare($sql14);
$exec14 = $prepare14->execute();
$res14 = $prepare14->fetch();

$status_usu = $dbh->query("UPDATE T_usuario SET status_usu = 0 WHERE idT_usuario = $id_temporario");
$status_usu->execute();

unset($_SESSION['id'], $_SESSION['nome']);


header('Location: ../index.php');