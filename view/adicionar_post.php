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
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />

    <!-- Icone de direct  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Icone de direct  -->
</head>

<body class="g-sidenav-show" style="background-color: #F28DB2;">

    <!-- Nav Bar -->

    <?php include_once("../view_padrao/nav.php") ?>

    <!-- End Nav Bar -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div id="contaner_topo" class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">GraviBaby</h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">

        </div>
        <!-- Main do perfil -->

        <main>
            <section style="display: flex; flex-direction: column; margin: 0 auto; width: 300px">
                <form enctype="multipart/form-data" method="POST" action="../controller/adicionar_post.php">
                    <label for="arquivo">Coloque seu post aqui</label>
                    <input type="file" name="arquivo">
                    <input style="max-width: 300px;" type="text" placeholder="Titulo do Post" name="titulo_postagem">
                    <input style="max-width: 300px;" type="text" placeholder="Descrição do Post" name="descricao_postagem">
                    <button type="submit">Enviar</button>
                    <input name="id" type="text" value="<?php echo $_SESSION['id'] ?>">
                </form>
            </section>
        </main>

        <!-- Fim do Main do perfil -->

    </main>

</body>

</html>