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
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
    <title>
        Perfil
    </title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        #Barra a{

            text-decoration: none;
            color: black;
            font-size: 35px;
        }
    </style>
    
    <link rel="stylesheet" href="../css_normal/style.css">
</head>

<?php
    include_once '../controller/util_php/infos_usuario.php';
    include_once '../config.php';

    $segue = false;
    $controle = true;

    if (isset($_GET["id_perfil"])) {
        $id_perfil = $_GET["id_perfil"];
        $idUsu = $id_perfil;
    }else{
        $idUsu = $_SESSION['id'];
    }

    $id_padrao = $_SESSION['id'];


    $sqlperfil = "SELECT * FROM t_publicacoes WHERE id_usuario = $idUsu ";

    $query = $dbh->prepare($sqlperfil);

    $query->execute();

    $seguidores = 600;
    $seguindo = 200;
    
?>

<body class="g-sidenav-show">
    <div style="height: 80%;" class="container-fluid">
        <?php include_once '../componentes/perfil.php' ?>

        <div id="Barra" class="row fixed-bottom d-flex justify-content-beteewen align-items-center bg-light">
              <a style="flex-direction: column; align-items: center;" href="./home/home.php" type="" name="home"  class="col-3 d-flex flex-collumn justify-content-center">
                  <span class="material-symbols-outlined"><i class="bi bi-house"></i></span>
                  <span style="font-size: 1rem;" class="">home</span>
              </a> 

              <a style="flex-direction: column; align-items: center;" href="#" type="button" name="home"  class="col-2 d-flex justify-content-center">
                  <span class="material-symbols-outlined"><i class="bi bi-person-vcard"></i></span>
                  <span style="font-size: 1rem;" class="">fórum</span>
              </a> 

              <a href="./postmaker.php" type="button" name="add" class="col-2 d-flex justify-content-center">
                  <span style="font-size: 45px;" class="material-symbols-outlined"><i class="bi bi-plus-lg"></i></span>
              </a>

              <a style="flex-direction: column; align-items: center;" href="../view/pesquisa_usuario.php" type="button" name="home"  class="col-2 d-flex justify-content-center">
                  <span class="material-symbols-outlined"><i class="bi bi-search"></i></span>
                  <span style="font-size: 1rem;" class="">explorar</span>
              </a> 

              <a style="flex-direction: column; align-items: center;" href="../view/perfil.php" type="button" name="home" class="col-3 d-flex justify-content-center">
                  <span class="material-symbols-outlined"><i class="bi bi-person"></i></span>
                  <span style="font-size: 1rem;" class="">perfil</span>
              </a>
        </div>
    </div>
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.js"></script>
</body>

</html>