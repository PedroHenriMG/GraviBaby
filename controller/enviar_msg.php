<?php

include_once("../config.php");

$idUsu = $_POST['idUsu'];
$mensagem = $_POST['msg_usuario'];

$sql8 = $dbh ->prepare('INSERT INTO T_chat (idT_chat,mensagem,T_usuario_idT_usuario)' . 'VALUES(null,:mensagem,:idUsu)');
$sql8->execute(Array(
    ':mensagem' => $mensagem,
    ':idUsu' => $idUsu,
));

header("Location: ../view/chat/index.php");