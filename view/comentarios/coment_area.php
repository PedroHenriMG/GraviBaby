<?php
session_start();
ob_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home/bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        h1 {
            margin-bottom: 0;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include_once '../comentarios/componentes/coment_header.php' ?>
    <!-- header -->

    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <?php include_once '../comentarios/componentes/coment_box.php' ?>
        </div>
    </div>

    <?php include_once '../comentarios/componentes/coment_add_box.php' ?>
</body>

</html>