<style>
    .hexagon {
        width: 200px;
        height: 230px;
        background: center center no-repeat;
        background-size: cover;
        position: relative;
        clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        margin: 0 auto;
    }

    .card {
        border: 3px solid transparent;
        background: transparent;
    }
</style>

<?php

include_once '../config.php';
include_once '../controller/util_php/infos_usuario.php';



?>
<div class="row d-flex justify-content-center pt-2">
    <div class="col-2">
        <form action="../controller/sair_sessao.php">
            <button class="btn btn-danger" type="submit">X</button>
        </form>
    </div>
    <div class="mt-5 col-8 text-center d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="col-12" action="../controller/editar_perfil.php">
            <input style="display: none;" type="file" id="arquivo" name="arquivo"></input>
            <label class="hexagon" for="arquivo">
                <img style="width: 200px;
        height: 230px;" src="<?php echo $foto ?>" alt="">
            </label>
            <input style="display: none;" type="text" value="<?php echo $_SESSION['id'] ?>" id="id" name="id">
            <input class="button" type="submit">
        </form>
        <h1><strong><?php echo $nomeCompleto_usuario; ?></strong></h1>
        <h6><strong>@<?php echo $n_usuario ?></strong></h6>
        <div class="row col-12">
            <p class="col-6 text-center"> <strong>1k</strong> <br> Seguidores</p>
            <p class="col-6 text-center"> <strong>500</strong> <br> Seguindo</p>
            <?php  ?>
            <form action="../controller/seguir.php" method="post" class="col-12 d-flex justify-content-center">
                <div class="col-6">
                    <button type="submit" style="background-color: #BE408C;" type="button" class="btn">Seguir</button>
                    <input style="display: none;" name="id_usuario" type="text" value="<?php echo $id_padrao ?>">
                    <input style="display: none;" name="id_amigo" type="text" value="<?php echo $idUsu ?>">
                </div>
                <div class="col-6">
                    <button style="background-color: #4456A0;" type="button" class="btn">Mensagem</button>
                </div>
            </form>
            <?php ?>
        </div>
    </div>

    <span class="material-symbols-outlined col-2 text-end">settings</span>
</div>

<div class="row d-flex justify-content-center mt-4">
    <p class="col-12 text-start">Postagens <?php echo $totalposts; ?></p>
    <div class="row col-12 d-flex mt-2 mb-5">
        <?php
        while ($dados = $query->fetch()) {

        ?>
            <img src="<?php echo $dados['foto'] ?>" alt="" class="col-4 card">
        <?php } ?>
    </div>
</div>