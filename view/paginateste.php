<?php
session_start();
ob_start();


if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>

<h1>Seu nome é:<?php echo $_SESSION['nome'] ?> e id: <?php echo $_SESSION['id'] ?></h1>

<a href="../controller/sair_sessao.php">Sair</a>