<?php

include_once '../config.php';

// Credênciais do usuário

$nome_completo = $_POST['nome_completo'];
$n_usuario = $_POST['n_usuario'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];

//Verificando se a conta já existe

$stmt2 = $dbh->query("SELECT email FROM T_usuario WHERE email = '$email_usuario'");


$res = $stmt2->rowCount();
    if($res==null || $stmt2==null){

// Inserindo informações no banco

        $stmt = $dbh->prepare('INSERT INTO T_usuario (idT_usuario,nomeCompleto_usuario,n_usuario,email,senha)' . 'VALUES(null,:nome_completo,:n_usuario,:email_usuario,:senha_usuario)');
        $stmt->execute(Array(
        ':nome_completo' => $nome_completo,
        ':n_usuario' => $n_usuario,
        ':email_usuario' => $email_usuario,
        ':senha_usuario' => $senha_usuario,
        ));
    }else{
        header("Location: ../view/registrar.html");
    }


//Voltando a página de login

header("Location: ../index.php");

?>