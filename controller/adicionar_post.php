<?php

include_once("../config.php");

// Pegando informações do post

$id_usuario = $_POST['id'];
$titulo_postagem = "post";
$descricao_postagem = $_POST['descricao_postagem'];

// Verificando se o botão de publico setá apertado ou não

if (isset($_POST['status']) && $_POST['status'] == 'on'){
    $statuspost = 0;
}else{
    $statuspost = 1;
}

if (isset($_FILES['picture__input'])) {

    $arquivo = $_FILES['picture__input'];

    $pasta = "../postagens/";

    $arquivo = $_FILES['picture__input'];
    if ($arquivo['size'] > 100097000) {
        die("arquivo muito grande max 10mb");
    }
    $nomeArquivo = $arquivo['name'];

    $novoNomeArquivo = uniqid();

    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "" && $extensao != "gif" && $extensao != "jpeg") {
        die();
    }

    $path = $pasta . $novoNomeArquivo . "." . $extensao;
    $caminho = $path;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    if ($deu_certo) {
        $sql17 = "INSERT INTO T_publicacoes (foto, idT_publicacao, descricao, titulo, status, id_usuario, id_grupo) VALUES (:caminho, null, :descricao_postagem, :titulo_postagem, :statuspost, :id_usuario, 1)";
        $prepare17 = $dbh->prepare($sql17);
        $prepare17->bindParam(':caminho', $caminho);
        $prepare17->bindParam(':descricao_postagem', $descricao_postagem);
        $prepare17->bindParam(':titulo_postagem', $titulo_postagem);
        $prepare17->bindParam(':statuspost', $statuspost);
        $prepare17->bindParam(':id_usuario', $id_usuario);
        $exec17 = $prepare17->execute();
    }
}

header("Location: ../view/home/home.php");
