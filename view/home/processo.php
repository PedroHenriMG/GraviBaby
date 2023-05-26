<?php
session_start();
ob_start();


if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}

include_once "../../config.php";

$idPost = filter_input(INPUT_POST, "idPost");

$sqlComentarios = "SELECT * FROM T_comentarios WHERE idT_publicacao = $idPost";

$prepare28 = $dbh->prepare($sqlComentarios);
$excec28 = $prepare28->execute();
$res28 = $prepare28->fetchAll();

foreach ($res28 as $linha28) {

?>

    <li></li>

<?php } ?>

<style>
    img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }
</style>

<!-- header -->
<?php include_once '../comentarios/componentes/coment_header.php' ?>
    <!-- header -->


<div class="row justify-content-center text-center align-items-center" style="margin-top: 5vh;">
    <div class="col-2 align-self-start">
        <img src="http://localhost/teste/gravibaby/view/comentarios/img/fotoperfil.png" alt="">
    </div>
    <div id="coment-box" class="col-10">
        <p class="col-12 rounded-end justify-content-center text-start align-items-center bg-success p-2 text-dark bg-opacity-10">
            <strong><?php echo $linha28['conteudo'] ?></strong><br><?php echo $linha28['conteudo'] ?></strong>
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

<?php include_once "../comentarios/componentes/coment_add_box.php" ?>