<?php

include_once("../config.php");


$id_usuario = $_POST['id'];
$n_usuario = $_POST['n_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_completo = $_POST['nome_completo'];
$bio1 = $_POST['bio1'];
$bio2 = $_POST['bio2'];
$bio3 = $_POST['bio3'];

$n_usuarioIguais = 0;

$sql2 = "SELECT * FROM T_usuario";
$prepare2 = $dbh->prepare($sql2);
$exec2 = $prepare2->execute();

$res2 = $prepare2->fetchAll();

foreach($res2 as $linha2){
    if($linha2['n_usuario']== $n_usuario){
        $n_usuarioIguais++;
    }
}

    if($n_usuarioIguais > 1){

        $sql3 = "SELECT n_usuario FROM T_usuario WHERE idT_usuario = $id_usuario";
        $prepare3 = $dbh->prepare($sql3);
        $exec3 = $prepare3->execute();
        $res3 = $prepare3->fetch(PDO::FETCH_ASSOC);
        
            if($res3['n_usuario'] == $n_usuario){
                echo $res3['n_usuario'] . $n_usuario;

                $sql = "UPDATE T_usuario SET nomeCompleto_usuario = '$nome_completo', n_usuario = '$n_usuario', email = '$email', senha = '$senha', bio1 = '$bio1', bio2 = '$bio2', bio3 = '$bio3' WHERE idT_usuario = $id_usuario";

                $prepare = $dbh->prepare($sql);
                $res = $prepare->execute();
                header("Location: http://localhost/GraviBaby/view/editar.php");

            }else{
                echo "nome de usuario já existe";
                
            }
        
            
    }else{
        $sql = "UPDATE T_usuario SET nomeCompleto_usuario = '$nome_completo', n_usuario = '$n_usuario', email = '$email', senha = '$senha', bio1 = '$bio1', bio2 = '$bio2', bio3 = '$bio3' WHERE idT_usuario = $id_usuario";

        $prepare = $dbh->prepare($sql);
        $res = $prepare->execute();

        header("Location: http://localhost/GraviBaby/view/editar.php");
    }




