<style>
    img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }
</style>


<?php

$idUsu = $_POST['idUsu'];
$idPost =$_POST['coment'];

include_once "../../config.php";

$sqlPost = $dbh->query("SELECT * FROM T_comentarios WHERE idT_publicacao = $idPost");
$resPost = $sqlPost->fetchAll();

foreach($resPost as $linhaPost){
    $idComent = $linhaPost['id_comentando'];
    $sqlComent = $dbh->query("SELECT * FROM T_usuario WHERE idT_usuario = $idComent");
    $resComent = $sqlComent->fetchAll();

    foreach($resComent as $linhaComent){
        
?>

<div class="row justify-content-center text-center align-items-center" style="margin-top: 5vh;">
    <div class="col-2 align-self-start">
        <img src="<?php if ($linhaComent['foto'] != "") {
            echo "../" . $linhaComent['foto'];
        } else {
            echo "../../fotos_perfil/padrao.jpg";
        }  ?> ?>" alt="">
    </div>
    <div id="coment-box" class="col-10">
        <p class="col-12 rounded-end justify-content-center text-start align-items-center bg-success p-2 text-dark bg-opacity-10">
            <strong><?php echo $linhaComent['n_usuario'] ?></strong><br><?php echo $linhaPost['conteudo'] ?>
        </p>

        <div class="row justify-content-top text-start">
            <p class="col-3">1 sem</p>
            <p class="col-3"><span class="material-symbols-outlined">
                    add_comment
                </span></p>
            <p class="col-3"><span class="material-symbols-outlined">
                    thumb_up
                </span></p>
            <p class="col-3"><span class="material-symbols-outlined">
                    thumb_down
                </span></p>
        </div>
    </div>
</div>

<?php
     }
        }
?>
