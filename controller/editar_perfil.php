<?php

include_once("../config.php");

$id_usuario = $_POST['id'];
$n_usuario = $_POST['n_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_completo = $_POST['nome_completo'];
$bio1 = $_POST['bio1'];
$bio2 = $_POST['bio2'];
$bio3 = $_POST['bio3'];

$sql = "UPDATE T_usuario SET nomeCompleto_usuario = '$nome_completo', n_usuario = '$n_usuario', email = '$email', senha = '$senha', bio1 = '$bio1', bio2 = '$bio2', bio3 = '$bio3' WHERE idT_usuario = $id_usuario";

$prepare = $dbh->prepare($sql);
$res = $prepare->execute();

header("location: http://localhost/GraviBaby/view/perfil.php");

