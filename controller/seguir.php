<?php

include_once '../config.php';

$id_usuario_post = $_POST['id_usuario_post'];
$id_usuario = $_POST['id_usuario'];


$sql21 = $dbh->query("SELECT * FROM T_amigo WHERE id_do_amigo = '$id_usuario_post' AND T_usuario_idT_usuario = '$id_usuario'");


$res21 = $sql21->rowCount();
    if($res21==null || $sql21==null){

$sql20 = 'INSERT INTO T_amigo (idT_amigo,id_do_amigo,T_usuario_idT_usuario)' . 'VALUES(null,:id_usuario_post,:id_usuario)';
$prepare20 = $dbh ->prepare($sql20);
$prepare20->execute(Array(
    ':id_usuario_post' => $id_usuario_post,
    ':id_usuario' => $id_usuario,
));

    }else{

        header("Location: ../view/dashboard.php");

    }