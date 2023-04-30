<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css_normal/login1.css">
    <title>login</title>
</head>
<body>
    <div class="login-card">
        <h2 id="gravy">Gravi&#10084;</h2><h2 id="baby">Baby</h2>
        <h3>Coloque suas credenciais</h3>

        <form method="post" class="login-form" action="../controller/salvarUsu.php">
            <div>
                <input id="nome" type="text" placeholder="Nome Completo" name="nome_completo">
                <input id="n_user_reg" type="text" placeholder="Nome de usuário" name="n_usuario">
            </div>
            <div>
                <input id="email_reg" type="email" placeholder="Email" name="email_usuario">
                <input id="password_reg" type="password" placeholder="Senha" name="senha_usuario">
            </div>
            <button type="submit">REGISTRAR-SE</button>
        </form>
        </div>
    </div>
</body>
</html>