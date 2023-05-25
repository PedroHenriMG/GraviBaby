<?php
session_start();
ob_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fazer um post</title>
    <link rel="stylesheet" href="./home/bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css_normal/postmaker.css">

    <style>
        a#return {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="bg-light fixed-top navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="col-2 justify-content-start" id="return" href="../index.php" style="font-size: 17px;">
                <span class="material-symbols-outlined col-3">
                    <strong>
                        close
                    </strong>
                </span>
            </a>

            <h1 style="font-size: 17px;" class="col-4 justify-content-center align-items-center">Publicação</h1>

            <a class="justify-content-end" style="font-size: 17px;" href="">
                <span class="material-symbols-outlined col-3 ">
                    <strong>arrow_forward_ios</strong>
                </span>
            </a>
    </header>
    <!-- header -->

    <main class="container-fluid">
        <div class="row d-flex align-items-center">
            <form enctype="multipart/form-data" method="POST" action="../controller/adicionar_post.php">
                <div class="row d-flex align-items-center">
                    <input type="file" id="picture__input" name="picture__input"></input>
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image"></span>
                    </label>

                    <div style="margin-top: 20px;" class="input-group mb-3">
                        <div class="form-floating">
                            <textarea name="descricao_postagem" style="height: 100px;" class="form-control" id="usuarios_marcados" placeholder="Username"></textarea>
                            <label for="usuarios_marcados">legenda</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="usuarios_marcados" placeholder="Username">
                            <label for="usuarios_marcados">marcar amigos</label>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <div class="form-check form-switch">
                            <input style="height: 25px; width: 50px;" class="form-check-input" type="checkbox" role="switch" id="status" name="status">
                            <label class="form-check-label mx-2" for="status">Tornar pubicação privada</label>
                        </div>

                        <div style="margin-bottom: 25px;" class="form-check form-switch">
                            <input style="height: 25px; width: 50px;" class="form-check-input" type="checkbox" role="switch" id="status_comentario" name="status_comentario">
                            <label class="form-check-label mx-2" for="status_comentario">Permitir comentários</label>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary">
                    <input style="display: none;" name="id" type="text" value="<?php echo $_SESSION['id'] ?>">

            </form>
        </div>


    </main>

    <script src="../js_normal/postmaker.js"></script>
</body>

</html>