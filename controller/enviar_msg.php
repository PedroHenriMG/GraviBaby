<?php

include_once("../config.php");

$id_conversa = $_GET["id_conversa"];
$idUsu = $_POST['idUsu'];
$mensagem = $_POST['msg_usuario'];
$idAmigo = $_POST['id_amigo'];

$sql8 = $dbh->prepare('INSERT INTO T_chat (destinatario, remetente, idT_chat, mensagem) VALUES (:id_conversa, :idUsu, null, :mensagem)');
$sql8->execute(array(
    ':mensagem' => $mensagem,
    ':idUsu' => $idUsu,
    ':id_conversa' => $id_conversa, // Adicionando vinculação do parâmetro :idAmigo
));

header("Location: ../view/chat/aba_conversa.php?id_conversa=$id_conversa");