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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        a{

            text-decoration: none;
            color: black;
            font-size: 35px;
        }
    </style>
</head>

<?php
    include_once '../controller/util_php/infos_usuario.php';
    include_once '../config.php';

    $sqlperfil = "SELECT * FROM t_publicacoes";

    $query = $dbh->prepare($sqlperfil);

    $query->execute();

    $totalposts = $query->rowCount();
    

?>

<body class="g-sidenav-show" style="background-image: linear-gradient(to right, #BE408C, #4456A0);">
    <div class="container-fluid">
        <?php include_once '../componentes/perfil.php' ?>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-xl-6 col-xxl-4">
                <div id="Fixado" class="row fixed-bottom d-flex justify-content-beteewen align-items-center bg-light">
                        <a href="./home/home.php" type="" name="home"  class="col-3 d-flex justify-content-center">
                            <span class="material-symbols-outlined">home</span>
                        </a> 
                        
                        <a href="#" type="button" name="home"  class="col-2 d-flex justify-content-center">
                            <span class="material-symbols-outlined">home</span>
                        </a> 

                        <a href="./postmaker.php" type="button" name="add" class="col-2 d-flex justify-content-center">
                            <span style="font-size: 45px;" class="material-symbols-outlined">add</span>
                        </a>

                        <a href="#" type="button" name="home"  class="col-2 d-flex justify-content-center">
                            <span class="material-symbols-outlined">home</span>
                        </a> 

                        <a href="./perfil.php" type="button" name="home" class="col-3 d-flex justify-content-center">
                            <span class="material-symbols-outlined">person</span>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.js"></script>
</body>

</html>