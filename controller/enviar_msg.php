<?php

include_once("../config.php");

$idUsu = $_POST['idUsu'];
$mensagem = $_POST['msg_usuario'];
$idAmigo = $_POST['id_amigo'];

$sql8 = $dbh->prepare('INSERT INTO T_chat (destinatario, remetente, idT_chat, mensagem) VALUES (:idAmigo, :idUsu, null, :mensagem)');
$sql8->execute(Array(
    ':mensagem' => $mensagem,
    ':idUsu' => $idUsu,
    ':idAmigo' => $idAmigo, // Adicionando vinculação do parâmetro :idAmigo
));

header("Location: ../view/chat/index.php");
