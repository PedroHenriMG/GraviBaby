<style>
    .hexagon {
        width: 200px;
        height: 230px;
        background: url('../imagens/gravida1.jpg') center center no-repeat;
        background-size: cover;
        position: relative;
        clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        margin: 0 auto;
    }

    .card{
        border: 3px solid transparent; 
        background: transparent;
    }
</style>
<div class="row d-flex justify-content-center pt-2">
    <div class="col-2"></div>
    <div class="mt-5 col-8 text-center d-flex flex-column justify-content-center align-items-center">
        <div class="hexagon"></div>
        <h1>Carlos Eduardo</h1>
        <h6>@Carlos_.ls</h6>
        <div class="row col-12">
            <p class="col-6 text-center">1k Seguidores</p>
            <p class="col-6 text-center">500 seguindo</p>
            <form action="" method="post" class="col-12 d-flex justify-content-center">
                <div class="col-6">
                    <button style="background-color: #BE408C;" type="button" class="btn">Seguir</button>
                </div>
                <div class="col-6">
                    <button style="background-color: #4456A0;" type="button" class="btn">Mensagem</button>
                </div>
            </form>            
        </div>
    </div>
    
    <span class="material-symbols-outlined col-2 text-end">settings</span>
</div>

<div class="row d-flex justify-content-center mt-4">
    <p class="col-12 text-start">Postagens 50</p>
    <div class="row col-12 d-flex mt-2 mb-5">
        <?php
            for($x = 0; $x<12; $x +=1){
        ?>
        <img src="../imagens/164903.jpg" alt="" class="col-4 card">
        <?php } ?>
    </div>
</div>