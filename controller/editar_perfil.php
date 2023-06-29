<?php

include_once("../config.php");

// Pegando o id do usuário do perfil

$id_usuario = $_POST['id'];



if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    $pasta = "../fotos_perfil/";

    $arquivo = $_FILES['arquivo'];
    if ($arquivo['size'] > 30097000) {
        die("arquivo muito grande max 2mb");
    }
    $nomeArquivo = $arquivo['name'];

    

    $novoNomeArquivo = uniqid();

    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "" && $extensao != "gif" && $extensao != "jpeg") {
        die();
        
    }

    $path = $pasta . $novoNomeArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    

    if ($deu_certo) {

        // Query de atualizar o perfil

        $dbh->query("UPDATE T_usuario SET foto = '$path' WHERE idT_usuario = $id_usuario");
    }

    header("Location: ../view/perfil.php");
}

