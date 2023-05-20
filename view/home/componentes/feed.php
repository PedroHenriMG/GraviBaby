<?php   

include_once "../../config.php";

$id_usuario_sessao = $_SESSION['id'];

$sqlPostagens = "SELECT * FROM T_publicacoes";
$preparePostagens = $dbh->prepare($sqlPostagens);
$preparePostagens->execute();
$resPostagens = $preparePostagens->fetchAll();

foreach($resPostagens as $linha_post){

?>

<div class="row d-flex justify-content-center text-center align-items-center" >
    <div id="Card" class="row d-flex justify-content-center text-center " style='background-image: url("../<?php echo $linha_post['foto'] ?>");'>
        <div style="height: 30px;" class="mt-3 col-10 text-start">
            <p>Carlos_.fs</p>
        </div>
        <svg style="height: 30px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-3 col-2 bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg>
    </div>
    <div class="row d-flex justify-content-between mt-2">
        <div class="col-6 text-start"><p><strong>1m curtidas</strong></p></div>
        <div class="col-6 text-end"><p><strong>1m comentários</strong></p></div>
    </div>
    <form method="get" action="" class="row d-flex justify-content-between">
        <button type="button" name="curtida" style="border: none; background-color:transparent;"  class="col-4 d-flex justify-content-start">
            <span class="col-12 material-symbols-outlined d-flex justify-content-start">thumb_up</span>
        </button>    

        <button type="button" name="comentario" style="border: none; background-color:transparent;" class="col-4 d-flex justify-content-center">
            <span class="col-12 material-symbols-outlined justify-content-center">chat</span>
        </button>

        <button type="button" name="compartilhar" style="border: none; background-color:transparent;" class="col-4 d-flex justify-content-end">
            <span style="transform: rotate(330deg);" class="colo-12 material-symbols-rounded justify-content-end">send</span>
        </button>

    </form>
    <div class="row mt-3">
        <p class="col-12 text-start"> <strong>Carlos_.fs</strong> Aqui foi colocado um comentário que eu mesmo criei </p>
    </div>
</div>
<?php }?>