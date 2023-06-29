<?php

include_once '../config.php';

// Pegando o id da pessoa que vc está seguindo e o seu id

$id_amigo = $_POST['id_amigo'];
$id_usuario = $_POST['id_usuario'];

echo "<h1> ".$id_amigo." </h1>";
echo "<h1> ".$id_usuario." </h1>";

// Verificando se já são amigos

$sql21 = $dbh->query("SELECT * FROM T_amigos WHERE id_amigo = '$id_amigo' AND id_usuario = '$id_usuario' AND id_amigo != '$id_usuario' or id_amigo = '$id_usuario' and id_usuario = '$id_amigo' and id_usuario != '$id_amigo'");


$res21 = $sql21->rowCount();
echo "<h1> ".$res21." </h1>";
if ($res21 == null || $sql21 == null || $res21 != 1) {

    $sql20 = 'INSERT INTO T_amigos (id_amigo,id_usuario)' . 'VALUES(:id_amigo,:id_usuario)';
    $prepare20 = $dbh->prepare($sql20);
    $prepare20->execute(array(
        ':id_amigo' => $id_amigo,
        ':id_usuario' => $id_usuario,
    ));

    header("Location: ../view/perfil.php?id_perfil=$id_amigo");
} else {

    header("Location: ../view/perfil.php?id_perfil=$id_amigo");
}
