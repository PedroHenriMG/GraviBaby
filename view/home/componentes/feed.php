<?php   

include_once "../../config.php";

$id_usuario_sessao = $_SESSION['id'];

$sqlPostagens = "SELECT * FROM T_publicacoes";
$preparePostagens = $dbh->prepare($sqlPostagens);
$preparePostagens->execute();
$resPostagens = $preparePostagens->fetchAll();

foreach($resPostagens as $linha_post){
    $id_publicacao = $linha_post['idT_publicacao'];

    $sqlLikes = "SELECT * FROM T_like WHERE idT_publicacao = $id_publicacao";

    $prepareLikes = $dbh->prepare($sqlLikes);
    $execLikes = $prepareLikes->execute();
    $coutLikes = $prepareLikes->rowCount();

?>

<div style="margin-top: var(--altura-tamanho); margin-bottom: var(--altura-tamanho);" class="row d-flex justify-content-center text-center align-items-center" >
    <div id="Card" class="row d-flex justify-content-center text-center col-xl-6" style='background-image: url("../<?php echo $linha_post['foto'] ?>");'>
        <div style="height: 30px;" class="mt-3 col-10 text-start">
            <p>Carlos_.fs</p>
        </div>
        <svg style="height: 30px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-3 col-2 bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg>
    </div>
    <div class="row d-flex justify-content-between mt-2">
        <div class="col-6 text-start"><p><strong><?php echo $coutLikes ?> Likes</strong></p></div>


        <?php

        $sql30 = "SELECT * FROM T_comentarios WHERE idT_publicacao = $id_publicacao AND id_comentando = $id_usuario_sessao";

        $prepare30 = $dbh->prepare($sql30);
        $exec30 = $prepare30->execute();
        $cout30 = $prepare30->rowCount();

        ?>


        <div class="col-6 text-end"><p><strong><?php echo $cout30 ?> Comentários</strong></p></div>
    </div>
    <div  class="row d-flex justify-content-between">
        <form class="col-1" method="GET" action="../../controller/adicionar_like.php">
            <button type="submit" name="curtida" value="<?php echo $id_publicacao ?>" style="border: none; background-color:transparent;"  class="col-1 d-flex justify-content-start">

                    <?php

                    $sql = "SELECT * FROM T_like WHERE idT_publicacao = $id_publicacao AND id_usuario = $id_usuario_sessao";

                    $prepare29 = $dbh->prepare($sql);
                    $exec29 = $prepare29->execute();
                    $cout29 = $prepare29->rowCount();
                    
                    ?>

                <span style="color: <?php if($cout29 > 0){ echo "blue";}else{echo"";} ?>;" class="col-12 material-symbols-outlined d-flex justify-content-start">thumb_up</span>
            </button>
        </form>    
<form class="col-1" action="../comentarios/coment_area.php">
    <button id="<?php echo $id_publicacao ?>" value="<?php echo $id_usuario_sessao ?>" type="submit" name="comentario" style="border: none; background-color:transparent;" class="comentario col-1 d-flex justify-content-center">
            <span id="<?php echo $id_publicacao ?>" value="<?php echo $id_usuario_sessao ?>" class="col-12 material-symbols-outlined justify-content-center">chat</span>
        </button>
</form>
        
        <button type="button" name="compartilhar" style="border: none; background-color:transparent;" class="col-1 d-flex justify-content-end">
            <span style="transform: rotate(330deg);" class="colo-12 material-symbols-rounded justify-content-end">send</span>
        </button>

</div>
    <div class="row mt-3">
        <p class="col-12 text-start"> <strong>Carlos_.fs</strong> Aqui foi colocado um comentário que eu mesmo criei </p>
    </div>
</div>
<?php }?>


<div id="res" class="caixaComentarios" style="background-color: black; display: none; width:20vw; height: 40vw; position: fixed; right:40%; top:30%">
    
</div>