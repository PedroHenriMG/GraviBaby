<?php
session_start();
ob_start();


if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        :root{
            --altura-tamanho: 7vh;
    }
    #Fixado{
        height: var(--altura-tamanho);
        
    }
    </style>
</head>
<body style="background-image: linear-gradient(to right, #BE408C, #4456A0); height: 100vh; width: 100vw;">
    <div class="container-fluid" style="background: transparent;">
        <div style="background: transparent;" class="row d-flex justify-content-center align-items-center">
            <div style="background: transparent;" class="col-12 col-md-8 col-xl-6 col-xxl-4">
                <?php include_once '../../componentes/header.php' ?>
                <?php include_once '../../componentes/feed.php'; ?>
                <?php include_once '../../componentes/navbar.php' ?> 
            </div>
        </div>
         
    </div>

    <script src="../../bootstrap-5.2.3-dist/js/bootstrap.js"></script>
    <!-- <script>

        $(".comentario").click((e)=>{
            e.preventDefault();
            console.log(e.target);
            const res =document.querySelector(".caixaComentarios");
            res.style = "background-color: black; display: flex; flex-direction: column; width:20vw; height: 40vw; position: fixed; right:40%; top:30%; color:white;"
            let idPost = e.target.id;
            var data= 
                {
                    idPost : idPost,
                };

                $.post("processo.php",data, function(result){
                    $("#res").html(result);
                });
        })

    </script> -->
</body>
</html>