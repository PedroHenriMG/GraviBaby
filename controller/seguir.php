<?php

include_once '../config.php';

// Pegando o id da pessoa que vc está seguindo e o seu id

$id_amigo = $_POST['id_amigo'];
$id_usuario = $_POST['id_usuario'];

// Verificando se já são amigos

$sql21 = $dbh->query("SELECT * FROM T_amigos WHERE id_amigo = '$id_amigo' AND id_usuario = '$id_usuario' AND id_amigo != '$id_usuario'");


$res21 = $sql21->rowCount();
if ($res21 == null || $sql21 == null) {

    $sql20 = 'INSERT INTO T_amigos (id_amigo,id_usuario)' . 'VALUES(:id_amigo,:id_usuario)';
    $prepare20 = $dbh->prepare($sql20);
    $prepare20->execute(array(
        ':id_amigo' => $id_amigo,
        ':id_usuario' => $id_usuario,
    ));

    header("Location: ../view/home/home.php");

} else {
    
    header("Location: ../view/home/home.php");
}
