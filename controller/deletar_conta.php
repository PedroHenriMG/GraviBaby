<?php

include_once("../config.php");

$id_usuario = $_POST['id_deletar'];

$sql = "DELETE FROM T_usuario WHERE idT_usuario = $id_usuario";

$prepare = $dbh->prepare($sql);
$res = $prepare->execute();

include_once("./sair_sessao.php");
