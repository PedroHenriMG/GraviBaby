<?php 
    include_once("../config.php");
    $id = $_SESSION['id'];

    $query6 = "SELECT * FROM T_usuario WHERE idT_usuario = $id";
    $prepare6 = $dbh -> prepare($query6);
    $resultado6 = $prepare6->execute();

    $res6 =  $prepare6->fetch();

    // Usuario

    $idT_usuario = $res6['idT_usuario'];
    $nomeCompleto_usuario = $res6['nomecompleto_usuario'];
    $n_usuario = $res6['n_usuario'];
    $email = $res6['email'];
    $senha = $res6['senha'];
     // Usuario
    
    
                    
       