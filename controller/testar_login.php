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
        $_SESSION['id'] = $linhalog['idT_usuario'];
        $_SESSION['nome'] = $linhalog['nomeCompleto_usuario'];

        $id_usu_poste = $_SESSION['id'];

        $sql4 = "SELECT * FROM T_foto_perfil WHERE T_usuario_idT_usuario = $id_usu_poste";
        $prepare4 = $dbh->prepare($sql4);

        $res4 = $prepare4->execute();
        $count4 = $prepare4->rowCount();        
        
        if($count4 > 1){
            header("Location: ../index.php");
        }else if($count4 == 0){
            $stmt = $dbh->prepare("INSERT INTO T_foto_perfil (idT_foto_perfil,titulo_foto_perfil,img,T_usuario_idT_usuario)" . "VALUES(null,'','','$id_usu_poste')");
            $stmt->execute();
            header("Location: ../view/dashboard.php");

        }else if($count4 == 1){
            header("Location: ../view/dashboard.php");
        }

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
