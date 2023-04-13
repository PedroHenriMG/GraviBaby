<?php

include_once("../config.php");

$titulo_postagem = $_POST['titulo_postagem'];

$id_usuario = $_POST['id'];

$likes = "0";

if(isset($_FILES['arquivo'])){

    $arquivo = $_FILES['arquivo'];

    $pasta = "../postagens/";

    $arquivo = $_FILES['arquivo'];
    if($arquivo['size']>2097000){
        die("arquivo muito grande max 2mb");
    }
    $nomeArquivo = $arquivo['name'];

    $novoNomeArquivo = uniqid();

    $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "png" && $extensao != ""){
        die();
    }

    $path = $pasta . $novoNomeArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path );

    if($deu_certo){
        $sql17 = "INSERT INTO T_postagens (idT_postagens, titulo_postagem, img, likes, T_usuario_idT_usuario) VALUES (null, :titulo_postagem, '$path', 0, $id_usuario)";
        $prepare17 = $dbh->prepare($sql17);
        $prepare17->bindParam(':titulo_postagem', $titulo_postagem);
        $exec17 = $prepare17->execute();
    }

}
