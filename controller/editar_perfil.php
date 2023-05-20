<?php

include_once("../config.php");

$id_usuario = $_POST['id'];

if (isset($_FILES['arquivo'])) {

    $arquivo = $_FILES['arquivo'];

    $pasta = "../fotos_perfil/";

    $arquivo = $_FILES['arquivo'];
    if ($arquivo['size'] > 2097000) {
        die("arquivo muito grande max 2mb");
    }
    $nomeArquivo = $arquivo['name'];

    $novoNomeArquivo = uniqid();

    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "") {
        die();
    }

    $path = $pasta . $novoNomeArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    if ($deu_certo) {
        $dbh->query("UPDATE T_usuario SET foto = '$path' WHERE idT_usuario = $id_usuario");
    }
}


$n_usuario = $_POST['n_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome_completo = $_POST['nome_completo'];
$emailIguais = 0;

$sql2 = "SELECT * FROM T_usuario";
$prepare2 = $dbh->prepare($sql2);
$exec2 = $prepare2->execute();

$res2 = $prepare2->fetchAll();

foreach ($res2 as $linha2) {
    if ($linha2['email'] == $email) {
        $emailIguais++;
    }
}

if ($emailIguais > 1) {

    $sql3 = "SELECT email FROM T_usuario WHERE idT_usuario = $id_usuario";
    $prepare3 = $dbh->prepare($sql3);
    $exec3 = $prepare3->execute();
    $res3 = $prepare3->fetch(PDO::FETCH_ASSOC);

    if ($res3['email'] == $email) {
        echo $res3['email'] . $email;

        $sql = "UPDATE T_usuario SET nomecompleto_usuario = '$nome_completo', n_usuario = '$n_usuario', email = '$email', senha = '$senha' WHERE idT_usuario = $id_usuario";

        $prepare = $dbh->prepare($sql);
        $res = $prepare->execute();
        header("Location: http://localhost/GraviBaby/view/editar.php");
    } else {
        echo "nome de usuario já existe";
    }
} else {
    $sql = "UPDATE T_usuario SET nomecompleto_usuario = '$nome_completo', n_usuario = '$n_usuario', email = '$email', senha = '$senha' WHERE idT_usuario = $id_usuario";

    $prepare = $dbh->prepare($sql);
    $res = $prepare->execute();

    header("Location: http://localhost/GraviBaby/view/editar.php");
}
