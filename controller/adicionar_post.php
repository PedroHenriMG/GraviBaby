<?php

include_once("../config.php");

$id_usuario = $_POST['id'];
$titulo_postagem = "post";
$descricao_postagem = $_POST['descricao_postagem'];

if (isset($_POST['status']) && $_POST['status'] == 'on'){
    $statuspost = 0;
}else{
    $statuspost = 1;
}

if (isset($_FILES['picture__input'])) {

    $arquivo = $_FILES['picture__input'];

    $pasta = "../postagens/";

    $arquivo = $_FILES['picture__input'];
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
        $sql17 = "INSERT INTO T_publicacoes (foto, idT_publicacao, descricao, titulo, statuspost, id_usuario, id_grupo) VALUES (:path, null, :descricao_postagem, :titulo_postagem, :statuspost, :id_usuario, 1)";
        $prepare17 = $dbh->prepare($sql17);
        $prepare17->bindParam(':path', $path);
        $prepare17->bindParam(':descricao_postagem', $descricao_postagem);
        $prepare17->bindParam(':titulo_postagem', $titulo_postagem);
        $prepare17->bindParam(':statuspostw', $status);
        $prepare17->bindParam(':id_usuario', $id_usuario);
        $exec17 = $prepare17->execute();
    }
}

header("Location: ../view/postmaker.php");
