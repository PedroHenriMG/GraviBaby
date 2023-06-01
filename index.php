<?php
session_start();
ob_start();
include_once './config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="./css_normal/login1.css">
    <link rel="shortcut icon" href="./imagens/favicon.ico" type="image/x-icon" />
    <title>Login</title>
</head>

<body>
    <div class="login-card">
        <h2 id="gravy">Gravi&#10084;</h2>
        <h2 id="baby">Baby</h2>
        <h3>Coloque suas credenciais</h3>
        <form method="POST" class="login-form" action="./controller/testar_login.php">
            <div class="credenciais">
                <input id="n_user" type="text" placeholder="Email" name="email">
                <input id="password" type="password" placeholder="Senha" name="senhalog">
            </div>
            <div class="links">
                <a id="esc_senha" href="#">Esqueceu a sua senha?</a>
                <a id="resgister" href="view/registrar.php">Registre-se</a>
            </div>
            <button type="submit" name="enviar">LOGIN</button>
        </form>
    </div>
</body>

</html>