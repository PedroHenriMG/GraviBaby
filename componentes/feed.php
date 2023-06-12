<?php

include_once "../../config.php";

$id_usuario_sessao = $_SESSION['id'];

$sqlPostagens = "SELECT * FROM T_publicacoes";
$preparePostagens = $dbh->prepare($sqlPostagens);
$preparePostagens->execute();
$resPostagens = $preparePostagens->fetchAll();

foreach ($resPostagens as $linha_post) {
    $id_publicacao = $linha_post['idT_publicacao'];

    $sqlLikes = "SELECT * FROM T_like WHERE idT_publicacao = $id_publicacao";
   

    $prepareLikes = $dbh->prepare($sqlLikes);
    $execLikes = $prepareLikes->execute();
    $coutLikes = $prepareLikes->rowCount();

?>

    <div style="margin-top: var(--altura-tamanho); margin-bottom: var(--altura-tamanho); " class="bg-white p-5 m-1 mt-5 row d-flex justify-content-center text-center align-items-center col-12">
        <div id="Card" class="row d-flex justify-content-center text-center col-xl-6 img-fluid" style='background-image: url("../<?php echo $linha_post['foto'] ?>"); background-size: cover; width:100%; height:500px;'>
            <div style="height: 30px; background-color: rgba(240, 248, 255, 0.705);" class="mt-3 col-12 text-start">
                <?php
                $idUsuPost = $linha_post['id_usuario'];
                $queryUsuPost = $dbh->query("SELECT * FROM T_usuario WHERE idT_usuario = $idUsuPost");
                $resUsuPost = $queryUsuPost->fetchAll();
                foreach($resUsuPost as $linha_usu_post){
                
                ?>
                    <p> <?php echo "@" .  $linha_usu_post['n_usuario'] ?></p>
            </div>
            <!-- <svg style="height: 30px; text-align: end;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" d-flex justify-content-end mt-3 col-10 bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
            </svg> -->
        </div>
        <div class=" row d-flex justify-content-between mt-2">
            <div class="col-5 text-start">
                <p id="cont_likes_<?php echo $id_publicacao; ?>"><strong><?php echo $coutLikes ?> Likes</strong></p>
            </div>

            <?php

            $sql30 = "SELECT * FROM T_comentarios WHERE idT_publicacao = $id_publicacao";

            $prepare30 = $dbh->prepare($sql30);
            $exec30 = $prepare30->execute();
            $cout30 = $prepare30->rowCount();

            ?>

            <div class="col-7 text-start">
                <p><strong><?php echo $cout30 ?> Comentários</strong></p>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <form class="col-1 like-form_<?php echo $id_publicacao ?>" method="post" action="../../controller/adicionar_like.php">
                <button id="icon_like" type="submit" name="curtida" value="<?php echo $id_publicacao ?>" style="border: none; background-color:transparent;" class="col-1 d-flex justify-content-start">

                    <?php

                    $sql = "SELECT * FROM T_like WHERE idT_publicacao = $id_publicacao AND id_usuario = $id_usuario_sessao";

                    $prepare29 = $dbh->prepare($sql);
                    $exec29 = $prepare29->execute();
                    $cout29 = $prepare29->rowCount();

                    ?>

                    <span  style="color: <?php if ($cout29 > 0) {
                                            echo "blue";
                                        } else {
                                            echo "";
                                        } ?>;" class="col-12 material-symbols-outlined d-flex justify-content-start"><i class="bi bi-hand-thumbs-up"></i></span>
                </button>
            </form>
            <form class="col-1" action="../comentarios/coment_area.php">
                <button id="<?php echo  $id_usuario_sessao?>" value="<?php echo $id_publicacao ?>" type="submit" name="idpost" style="border: none; background-color:transparent;" class="comentario col-1 d-flex justify-content-center">
                    <span id="<?php echo  $id_usuario_sessao?>" value="<?php echo  $id_publicacao?>" class="col-12 material-symbols-outlined justify-content-center"><i class="bi bi-chat-left-text"></i></span>
                </button>
            </form>
            <button type="button" name="compartilhar" style="border: none; background-color:transparent;" class="col-1 d-flex justify-content-end">
                <span style="transform: rotate(330deg);" class="colo-12 material-symbols-rounded justify-content-end"><i class="bi bi-share"></i></span>
            </button>

        </div>
        <div class="row mt-3">
            <p class="col-12 text-start"> <strong><?php echo $linha_usu_post['n_usuario'] ?></strong> <?php echo $linha_post['descricao'] ?> </p>
        </div>
    </div>
    <script>
$(document).on('click', '.like-form_<?php echo $id_publicacao ?> button', function(e) {
    e.preventDefault();
    
    var id_publicacao = $(this).val();
    var likesParagraph = $(this).closest('.row').find('.col-5 #cont_likes');
    
    $.ajax({
    type: 'GET',
    url: '../../controller/adicionar_like.php?curtida=<?php echo $id_publicacao ?>',
    data: {
        curtida: id_publicacao
    },
    dataType: 'json',
    success: function(response) {
        if (response.status === 'success') {
            // Atualizar a contagem de likes
            $("#cont_likes_<?php echo $id_publicacao ?>").html('<strong>' + response.countLikes + ' Likes</strong>');
            console.log(response.countLikes);
        }
    },
    error: function(xhr, status, error) {
        console.log('Erro na requisição AJAX:', error,xhr,status);
    }
});

});

</script>
<?php }} ?>


<div id="res" class="caixaComentarios" style="background-color: black; display: none; width:20vw; height: 40vw; position: fixed; right:40%; top:30%">

</div>
