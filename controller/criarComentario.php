<?php

include_once "../config.php";

$conteudo = $_POST['inputComentario'];
$idT_publicacao = $_POST['idPost'];
$id_comentando = $_POST['idUsu'];

$sqlCriarComentario = "INSERT INTO T_comentarios (conteudo, idT_publicacao, id_comentando) VALUES (:conteudo, :idT_publicacao, :id_comentando)";

$prepare29 = $dbh->prepare($sqlCriarComentario);
$exec29 = $prepare29->execute(array(
    ':conteudo' => $conteudo,
    ':idT_publicacao' => $idT_publicacao,
    ':id_comentando' => $id_comentando
));

header("Location: ../view/comentarios/coment_area.php" . "?idpost=" . $_POST['idPost']);