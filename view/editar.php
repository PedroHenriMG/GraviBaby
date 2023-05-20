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

    <link rel="stylesheet" href="../css_normal/editar.css">

    <!-- Icone de config  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Icone de config  -->
</head>

<body class="g-sidenav-show" style="background-color: #F28DB2;">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Nav -->

        <?php include_once("../view_padrao/nav.php") ?>

        <!-- End Nav -->

        <div class="container-fluid py-4 px-5">
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

        <?php
        include_once("../config.php");
        $id = $_SESSION['id'];
        ?>

        <section class="body_perfil">
            <section class="main_perfil">
                <h2>Editar Perfil</h2>
                <div class="section_infos_perfil">

                    <div class="infos_perfil">
                        <div class="editar_foto_perfil">
                            <div class="nome_infos_perfil">
                                <h5 id="nome_editar_foto" class="nomes_editar">Foto:</h5>
                            </div>

                        </div>
                        <form enctype="multipart/form-data" method="post" action="../controller/editar_perfil.php">

                            <?php

                            $sql24 = "SELECT foto FROM T_usuario WHERE idT_usuario = $id ";
                            $prepare24 = $dbh->prepare($sql24);
                            $res24 = $prepare24->execute();
                            $linha24 = $prepare24->fetch();

                            ?>

                            <div class="foto_perfil">
                                <img id="img_perfil" src=" <?php

                                                            if ($linha24['foto'] != "") {
                                                                echo $linha24['foto'];
                                                            }

                                                            ?>" alt="">
                                <input id="trocar_foto_perfil" name="arquivo" type="file">
                            </div>


                            <?php

                            $query = "SELECT nomecompleto_usuario,n_usuario,email,senha FROM T_usuario WHERE idT_usuario = $id";
                            $resultado = $dbh->prepare($query);
                            $resultado->execute();

                            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {

                            ?>

                                <div class="input_editar_perfil">
                                    <label for="n_usuario">
                                        <h5>Nome de Usuário:</h5>
                                    </label>

                                    <input name="n_usuario" type="text" value="<?php echo $linha['n_usuario'] ?>">

                                    <label for="email">
                                        <h5>Email:</h5>
                                    </label>

                                    <input name="email" type="text" value="<?php echo $linha['email'] ?>">

                                    <label for="senha">
                                        <h5>Senha:</h5>
                                    </label>

                                    <input name="senha" type="text" value="<?php echo $linha['senha'] ?>">

                                    <label for="nome_completo">
                                        <h5>Nome Completo:</h5>
                                    </label>

                                    <input name="nome_completo" type="text" value="<?php echo $linha['nomecompleto_usuario'] ?>">

                                    <input name="id" value="<?php echo $id; ?>" style="display: none;">
                                </div>

                            <?php } ?>

                            <div class="salvar_editar_perfil">
                                <input type="submit" value="Salvar">
                            </div>

                        </form>
                    </div>
                </div>
                </div>

                <hr>

                <div class="btn_deletar_conta">
                    <form method="post" action="../controller/deletar_conta.php">
                        <input name="id_deletar" value="<?php echo $id; ?>" style="display: none;">
                        <input type="submit" value="Deletar Conta">
                    </form>

                </div>
            </section>
            <div></div>
        </section>

        <!-- Fim do Main do perfil -->
    </main>

</body>

</html>