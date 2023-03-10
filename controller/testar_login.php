<?php
session_start();
ob_start();
include_once '../config.php';


$n_userlog = $_POST['n_userlog'];
$senhalog = $_POST['senhalog'];

$query_usuario = "SELECT *FROM T_usuario WHERE n_usuario = :n_userlog";
$reslog = $dbh->prepare($query_usuario);
$reslog->bindParam(':n_userlog', $n_userlog, PDO::PARAM_STR);


$reslog->execute();

if(($reslog) && $reslog->rowCount() != 0){
    $linhalog = $reslog->fetch(PDO::FETCH_ASSOC);
    

    if($senhalog == $linhalog['senha']){
        $_SESSION['id'] = $linhalog['idT_usuario'];
        $_SESSION['nome'] = $linhalog['nomeCompleto_usuario'];

        $id_usu_poste = $_SESSION['id'];

        $sql4 = "SELECT * FROM T_post WHERE T_usuario_idT_usuario = $id_usu_poste";
        $prepare4 = $dbh->prepare($sql4);

        $res4 = $prepare4->execute();
        $count4 = $prepare4->rowCount();        
        
        if($count4 > 1){
            header("Location: http://localhost/GraviBaby/");
        }else if($count4 == 0){
            $stmt = $dbh->prepare("INSERT INTO T_post (idT_post,titulo_post,img,T_usuario_idT_usuario)" . "VALUES(null,'','','$id_usu_poste')");
            $stmt->execute();
            header("Location: http://localhost/GraviBaby/view/dashboard.php");

        }else if($count4 == 1){
            header("Location: http://localhost/GraviBaby/view/dashboard.php");
        }

    }else{
        $_SESSION['msg'] = 'Erro: Email ou senha incorretos';
        header("Location: http://localhost/GraviBaby/");
    }

}else{
    $_SESSION['msg'] = 'Erro: Email ou senha incorretos';
    header("Location: http://localhost/GraviBaby/");
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
