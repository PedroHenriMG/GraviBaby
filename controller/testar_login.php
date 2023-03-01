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
                echo $_SESSION['nome'];
                header("Location: http://localhost/GraviBaby/view/dashboard.php");

            }else{
                $_SESSION['msg'] = 'Erro: Email ou senha incorretos';
                
            }

        }else{
            $_SESSION['msg'] = 'Erro: Email ou senha incorretos';
        }

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }


