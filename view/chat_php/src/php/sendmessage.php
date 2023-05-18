<?php
require_once('chat-conexao.php');


$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
$idconversa = 2;
$idusu = 1;

if($mensagem == ''){
	return false;
}else{
	
	$sql = $pdo->prepare('INSERT INTO T_chat (destinatario, remetente, idT_chat, mensagem) VALUES (:idconversa,:idusu,null,:msgParam)');

	$nome = htmlspecialchars($nome);
	$mensagem = htmlspecialchars($mensagem);

	$sql->bindParam(':msgParam', $mensagem);
	$sql->execute();
}
