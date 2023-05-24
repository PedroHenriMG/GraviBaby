<?php
session_start();
ob_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}

include_once "../config.php";

$id_publi = $_GET['curtida'];
$id_usuario = $_SESSION['id'];

$sql = "SELECT * FROM T_like WHERE idT_publicacao = $id_publi AND id_usuario = $id_usuario";

$prepare27 = $dbh->prepare($sql);
$exec27 = $prepare27->execute();
$cout27 = $prepare27->rowCount();

if ($cout27 > 0) {

    $sql2 = "DELETE FROM T_like WHERE idT_publicacao = $id_publi AND id_usuario = $id_usuario";

    $query27 =  $dbh->query($sql2);
    if ($query27 == TRUE) {
        echo "Linha excluída com sucesso da tabela T_like.";
        header("Location: ../view/home/index.php");
    } else {
        echo "Erro ao excluir linha da tabela T_like: " ; 
    }
} else {

    $sql3 = "INSERT INTO T_like (idT_like,idT_publicacao, id_usuario) VALUES (null,$id_publi, $id_usuario)";
    $query28 =  $dbh->query($sql3);
    if ($query28 == TRUE) {
        header("Location: ../view/home/home.php");
    } else {
        echo "Erro ao inserir registro na tabela T_like: " ;
    }
}
