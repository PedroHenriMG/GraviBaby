<?php

include_once '../config.php';

// Credenciais do usuário
$nome_completo = $_POST['nome_completo'];
$n_usuario = $_POST['n_usuario'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];

// Valores padrão
$status_usu = 0;
$foto = "";
$cidade = "";
$estado = "";
$verificado = 0;

$stmt2 = $dbh->prepare("SELECT email FROM T_usuario WHERE email = ?");
$stmt2->execute([$email_usuario]);
$usuario = $stmt2->fetch();

// Inserindo informações no banco
if(!$usuario) {
    $stmt = $dbh->prepare("INSERT INTO T_usuario (nomecompleto_usuario, n_usuario, email, senha) VALUES (:nome_completo, :n_usuario, :email_usuario, :senha_usuario)");
$stmt->execute(Array(
    ':nome_completo' => $nome_completo,
    ':n_usuario' => $n_usuario,
    ':email_usuario' => $email_usuario,
    ':senha_usuario' => $senha_usuario,
));
header("Location: ../index.php");
   
} else {
    echo "Conta já existe.";
    header("Location: ../index.php");
}


//Voltando a página de login
