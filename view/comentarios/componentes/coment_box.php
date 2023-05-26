<?php include_once "../../config.php";

$idPost = $_GET["idpost"];

$sqlComentarios = "SELECT * FROM T_comentarios WHERE idT_publicacao = $idPost";


$prepareComentarios = $dbh->prepare($sqlComentarios);
$prepareComentarios ->execute();
$resComentarios = $prepareComentarios->fetchAll();

foreach ($resComentarios as $comentarios) {

?>

    

<?php } ?>



<style>
    img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }
</style>


<div class="row justify-content-center text-center align-items-center" style="margin-top: 5vh;">
    <div class="col-2 align-self-start">
        <img src="http://localhost/teste/gravibaby/view/comentarios/img/fotoperfil.png" alt="">
    </div>
    <div id="coment-box" class="col-10">
        <p class="col-12 rounded-end justify-content-center text-start align-items-center bg-success p-2 text-dark bg-opacity-10">
            <strong><?php echo $comentarios['n_usuario']?></strong><br> <?php echo $comentarios['conteudo'] ?></strong>
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