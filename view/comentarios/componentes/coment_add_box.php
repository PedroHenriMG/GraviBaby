<?php include_once "../../config.php";?>


<form method="POST" action="../../controller/criarComentario.php">
    <div class="row fixed-bottom bg-light d-flex justify-content-center align-items-center">
        <div class="col-10 justify-content-center align-items-center">
            <input class="form-control" type="text" placeholder="Digite seu comentário" name="inputComentario">
            <input style="display: none;" name="idUsu" type="text" value="<?php echo $_SESSION['id'] ?>">
            <input style="display: none;" name="idPost" type="text" value="<?php echo $idPost ?>">
        </div>

        <label class="btn col-2 justify-content-center align-items-center" for="btncomentario"><span class="material-symbols-outlined">
            <span>
                arrow_forward_ios
            </span>
        </label>
        <button style="display: none;" name="btncomentario" id="btncomentario" type="submit" name="btnComentario">
    </div>
</form>