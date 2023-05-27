<?php
session_start();
ob_start();


if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Perfil
    </title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
</head>

<body class="g-sidenav-show">
<div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-xl-6 col-xxl-4">
                <?php include_once '../componentes/perfil.php' ?>
                <?php include_once '../componentes/navbar.php' ?> 
            </div>
        </div>
         
    </div>
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.js"></script>
</body>

</html>