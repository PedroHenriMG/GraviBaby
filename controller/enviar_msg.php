<?php
session_start();
ob_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
	header('Location: ../index.php');
	$_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
include_once("../config.php");

<<<<<<< HEAD
$idUsu = $_SESSION['id'];
$mensagem = filter_input(INPUT_POST, 'msg_usuario', FILTER_SANITIZE_STRING);
$id_conversa = $_SESSION['id_amigo'];
=======
$idUsu = $_POST['idUsu'];
$mensagem = $_POST['msg_usuario'];
$idAmigo = $_POST['id_amigo'];
>>>>>>> parent of 62a1b3c (chat terminado, eu acho...  tomára.)

$sql8 = $dbh->prepare('INSERT INTO T_chat (destinatario, remetente, idT_chat, mensagem) VALUES (:idAmigo, :idUsu, null, :mensagem)');
$sql8->execute(Array(
    ':mensagem' => $mensagem,
    ':idUsu' => $idUsu,
    ':idAmigo' => $idAmigo, // Adicionando vinculação do parâmetro :idAmigo
));

<<<<<<< HEAD
header("Location: ../view/chat/aba_conversa.php?id_conversa=". $id_conversa );


=======
header("Location: ../view/chat/index.php");
>>>>>>> parent of 62a1b3c (chat terminado, eu acho...  tomára.)
