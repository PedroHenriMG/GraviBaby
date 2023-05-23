<?php

include_once "../../config.php";

$idPost = filter_input(INPUT_POST,"idPost");

$sqlComentarios = "SELECT * FROM T_comentarios WHERE idT_publicacao = $idPost";

$prepare28 = $dbh->prepare($sqlComentarios);
$excec28 = $prepare28->execute();
$res28 = $prepare28->fetchAll();

foreach($res28 as $linha28){

?>

    <h3><?php echo $linha28['conteudo'] ?></h3>


<?php }?>

