<?php
session_start();
ob_start();
include_once '../config.php';


$email = $_POST['email'];
$senhalog = $_POST['senhalog'];

$query_usuario = "SELECT * FROM T_usuario WHERE email = :email";
$reslog = $dbh->prepare($query_usuario);
$reslog->bindParam(':email', $email, PDO::PARAM_STR);


$reslog->execute();

if(($reslog) && $reslog->rowCount() != 0){
    $linhalog = $reslog->fetch(PDO::FETCH_ASSOC);
    

    if($senhalog == $linhalog['senha']){
        $id_temporario = $linhalog['idT_usuario'];
        $_SESSION['id'] = $linhalog['idT_usuario'];
        $_SESSION['nome'] = $linhalog['nomecompleto_usuario'];
        $_SESSION['foto'] = $linhalog['foto'];
        $_SESSION['n_usuario'] = $linhalog['n_usuario'];

        $status_usu = $dbh->query("UPDATE T_usuario SET status = 1 WHERE idT_usuario = $id_temporario");
        $status_usu->execute();

        header("Location: ../view/dashboard.php");

    }else{
        $_SESSION['msg'] = 'Erro: Email ou senha incorretos';
        header("Location: ../index.php");
    }

}else{
    $_SESSION['msg'] = 'Erro: Email ou senha incorretos';
    header("Location: ../index.php");
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
