
<?php

include_once '../config.php';
include_once '../controller/util_php/infos_usuario.php';



?>

<script>
    function x(){
        const input = document.getElementById('inputUpload')
        const envia = document.getElementById('Foto')
        input.click();

        input.addEventListener('change', function(event) {
            let files = event.target.files; 

            if (files.length > 0) {
                envia.click();
                console.log('Arquivo selecionado:', files[0].name);
            } else {
                console.log('Nenhum arquivo selecionado');
            }
        })
    }



</script>


<div id="caixa-box-1" class="row d-flex justify-content-center">
    <div id="caixa-box-2" class="col-12 col-md-10 d-flex justify-content-between mt-3">
        <?php if($idUsu == $id_padrao){
            $voce = "display: flex;";
        }else{
            $voce = "display: none;";
        } ?>
        <form method="post" action="../controller/sair_sessao.php">
            <button style="<?php echo $voce ?>" class="btn btn-danger" type="submit">X</button>
        </form>

        <span class="material-symbols-outlined d-flex justify-content-center align-items-center">settings</span>
    </div>
    <div id="caixa-box-3" class="col-12 d-flex justify-content-center">
    <?php echo "<h1>" . $foto . "</h1>" ?>
        <img id="hexagon" src="<?php
            if($foto != ""){
                echo $foto;
            }else{
                echo "../fotos_perfil/padrao.jpg";
            }
            
        
        ?>" alt="">

         <?php 
            if($idUsu != $id_padrao){
                $display_edit = "display: none;";
            }else{
                $display_edit = "display: flex;";
            }
        ?>

        <div id="Edite" style="<?php echo $display_edit ?>" onclick="x()"><img src="../imagens/brush-fill.svg" alt=""></div>

    </div>
    <div id="caixa-box-4" class="col-12 d-flex flex-column justify-content-center align-items-center">
        <h1><?php echo $nomeCompleto_usuario; ?></h1>
        <h6><?php echo "@" . $n_usuario ?></h6>
        <div class="col-6 d-flex justify-content-around">
            <p class="text-center"><strong><?php echo $seguidores; ?> <br> Seguidores</strong></p>
            <p class="text-center"><strong><?php echo $seguindo; ?> <br> Seguindo</strong></p>
        </div>

        <?php 
            if($controle == true){
         ?>

        <form method="post" action="../controller/seguir.php" class="col-6 d-flex justify-content-around">

            <input style="display: none;" name="id_usuario" type="text" value="<?php echo $id_padrao ?>">
            <input style="display: none;" name="id_amigo" type="text" value="<?php echo $idUsu ?>">
            
            <?php if($segue == true){?>
            <button class="Botao btn btn-secondary" style="background-color: cise;" type="submit"><strong>Seguindo</strong></button>
            <?php }else if($segue == false){?>
            <button class="Botao" name="" style="background-color: blueviolet;" type="submit"><strong>Seguir</strong></button>
            <?php }?>
            <a class="Botao" href="#" style="background-color: cadetblue; text-decoration: none;"><strong>Mensagem</strong></a>
            
        </form>

        <?php } ?>

        <form method="post" action="../controller/editar_perfil.php" enctype="multipart/form-data">
        <form enctype="multipart/form-data" method="post" action="../controller/editar_perfil.php">
         <input style="display: none;" name="id" type="text" value="<?php echo $id_padrao ?>">
            <input id="inputUpload" name="arquivo" style="display: none;" type="file">
            <button id="Foto" name="id" value="<?php echo $idUsu ?>" style="display: none;" type="submit"></button>
        </form>
    </div>
    <div id="caixa-box-4" class="col-12 d-flex flex-wrap mt-5">
        <?php
            while ($dados = $query->fetch()) {
        ?>

        <img class="Post col-4" src="<?php echo $dados['foto'] ?>" alt="">
        
        <?php } ?>
    </div>
</div>
