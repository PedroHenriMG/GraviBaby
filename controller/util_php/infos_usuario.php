<?php 
    include_once("../config.php");
    $id = $_SESSION['id'];


    $query5 = "SELECT * FROM T_foto_perfil WHERE T_usuario_idT_usuario = $id";
    $prepare5 = $dbh -> prepare($query5);
    $resultado5 = $prepare5->execute();

    $res5 =  $prepare5->fetch();

    $query6 = "SELECT * FROM T_usuario WHERE idT_usuario = $id";
    $prepare6 = $dbh -> prepare($query6);
    $resultado6 = $prepare6->execute();

    $res6 =  $prepare6->fetch();

    // Usuario

    $idT_usuario = $res6['idT_usuario'];
    $nomeCompleto_usuario = $res6['nomeCompleto_usuario'];
    $n_usuario = $res6['n_usuario'];
    $email = $res6['email'];
    $senha = $res6['senha'];
    $publicacoes = ['publicacoes'];
    $seguidores = ['seguidores'];
    $seguindo = $res6['seguindo'];
    $bio1 = $res6['bio1'];
    $bio2 = $res6['bio2'];
    $bio3 = $res6['bio3'];

     // Usuario
    

     $idT_foto_perfil = $res5['idT_foto_perfil'];
     $titulo_foto_perfil = ['titulo_foto_perfil'];
     $img = $res5['img'];
     $T_usuario_idT_usuario = $res5['T_usuario_idT_usuario'];
    
                    
       