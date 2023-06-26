<?php

include_once "../../config.php";

$id_usuario_sessao = $_SESSION['id'];

    //Selecionado publicações

$sqlPostagens = "SELECT * FROM T_publicacoes ORDER BY CASE WHEN id_usuario = $id_usuario_sessao THEN 0 ELSE 1 END, id_usuario";
$preparePostagens = $dbh->prepare($sqlPostagens);
$preparePostagens->execute();
$resPostagens = $preparePostagens->fetchAll();

foreach ($resPostagens as $linha_post) {
    $id_publicacao = $linha_post['idT_publicacao'];

    //Percorendo publicações e pegando os likes de cada publicação

    $sqlLikes = "SELECT * FROM T_like WHERE idT_publicacao = $id_publicacao";
   

    $prepareLikes = $dbh->prepare($sqlLikes);
    $execLikes = $prepareLikes->execute();

    //Pegando a quantidade de likes

    $coutLikes = $prepareLikes->rowCount();

?>

    <!-- Criando um card para cada publicação -->

    <div style="margin-top: var(--altura-tamanho); margin-bottom: var(--altura-tamanho); " class="bg-white p-5 m-1 mt-5 row d-flex justify-content-center text-center align-items-center col-12">
        <div id="Card" class="row d-flex justify-content-center text-center col-xl-6 img-fluid" style='background-image: url("../<?php echo $linha_post['foto'] ?>"); background-size: cover; width:100%; height:500px;'>
            <div style="height: 30px; background-color: rgba(240, 248, 255, 0.705);" class="mt-3 col-12 text-start">
                <?php

                //Pegando os dados do usuario que fez a publicação

                $idUsuPost = $linha_post['id_usuario'];
                $queryUsuPost = $dbh->query("SELECT * FROM T_usuario WHERE idT_usuario = $idUsuPost");
                $resUsuPost = $queryUsuPost->fetchAll();
                foreach($resUsuPost as $linha_usu_post){
                
                ?>
                    <p> <?php echo "@" .  $linha_usu_post['n_usuario'] ?></p>
            </div>
            
        </div>
        <div class=" row d-flex justify-content-between mt-2">
            <div class="col-5 text-start">
                <p id="cont_likes_<?php echo $id_publicacao; ?>"><strong><?php echo $coutLikes ?> Likes</strong></p>
            </div>

            <?php

            //Pegando os comentários de cada publicação

            $sql30 = "SELECT * FROM T_comentarios WHERE idT_publicacao = $id_publicacao";

            $prepare30 = $dbh->prepare($sql30);
            $exec30 = $prepare30->execute();

            //Pegando a quantidade de comentários de cada publicação

            $cout30 = $prepare30->rowCount();

            ?>

            <div class="col-7 text-start">
                <p><strong><?php echo $cout30 ?> Comentários</strong></p>
            </div>
        </div>
        <div class="row d-flex justify-content-between">

            <!-- Form para adicionar like, tem que passar o id da publicação e o id de quem está dando like -->

            <form class="col-1 like-form_<?php echo $id_publicacao ?>" method="post" action="../../controller/adicionar_like.php">
                <button id="icon_like" type="submit" name="curtida" value="<?php echo $id_publicacao ?>" style="border: none; background-color:transparent;" class="col-1 d-flex justify-content-start">

                    <?php

                    // Puxando a quantidade de likes que o usuario da sessão deu para se for maior que 1 o like ficar azul e se não for ficar branco

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

        <!-- Form para comentar, passando o id da publicação e o id de quem está comentando -->

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

        <!-- Script para dar like sem recarregar a página, quer entender vai estudar -->

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

    <!-- Fim do loop -->

<?php }} ?>


<div id="res" class="caixaComentarios" style="background-color: black; display: none; width:20vw; height: 40vw; position: fixed; right:40%; top:30%">

</div>
