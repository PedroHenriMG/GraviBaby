<?php
session_start();
ob_start();


if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}

include_once "../../config.php";

$idPost = filter_input(INPUT_POST,"idPost");

$sqlComentarios = "SELECT * FROM T_comentarios WHERE idT_publicacao = $idPost";

$prepare28 = $dbh->prepare($sqlComentarios);
$excec28 = $prepare28->execute();
$res28 = $prepare28->fetchAll();

foreach($res28 as $linha28){

?>

    <li><?php echo $linha28['conteudo'] ?></li>

<?php }?>

<form method="POST" action="../../controller/criarComentario.php">
    <input class="form-control" type="text" placeholder="Digite seu comentário" name="inputComentario">
    <input style="display: none;" name="idUsu" type="text" value="<?php echo$_SESSION['id'] ?>">
    <input style="display: none;" name="idPost" type="text" value="<?php echo $idPost ?>">
    <input id="btnComentario" class="btn btn-primary" type="submit" name="btnComentario">
</form>

