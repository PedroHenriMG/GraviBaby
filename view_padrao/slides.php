<div class="row">
    <div class="position-relative overflow-hidden">
        <div class="swiper mySwiper mt-4 mb-2">
            <div class="swiper-wrapper">

                <?php

                include_once '../config.php';

                $id_usuario = $_SESSION['id'];

                $sql18 = "SELECT * FROM T_usuario WHERE idT_usuario";

                $prepare18 = $dbh->prepare($sql18);

                $prepare18->execute();

                $res18 = $prepare18->fetchAll();

                foreach ($res18 as $linha18) {
                    $id_usu_geral = $linha18["idT_usuario"];

                    ?>
                    <div class="swiper-slide">
                        <div>
                            <div
                                class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                <div class="full-background bg-cover"
                                    style="background-image: url('<?php echo $linha18['foto'] ?> ');  min-width: 100%x; max-height: 1000px; background-size: 60%; background-repeat: no-repeat"></div>
                                <div class="card-body text-start px-3 py-0 w-100">
                                    <div class="row mt-12">
                                        <div class="col-sm-3 mt-auto">
                                            <h4 class="text-dark font-weight-bolder"></h4>
                                            <p class="text-dark opacity-10 text-xs font-weight-bolder mb-0">
                                                <?php echo $linha18['n_usuario'] ?>
                                            </p>
                                            <h5 class="text-dark font-weight-bolder">
                                                <?php echo $linha18['email'] ?>
                                            </h5>
                                        </div>
                                        <div class="col-sm-3 ms-auto mt-auto">
                                            <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0"></p>
                                            <h5 class="text-dark font-weight-bolder">
                                                <?php if ($linha18['status'] == 1) {
                                                    echo 'online';
                                                } else {
                                                    echo 'offline';
                                                }
                                                ?>
                                            </h5>
                                            <form method="post" action="../controller/seguir.php">
                                                <input type="text" name="id_amigo" style="display: none;" value="<?php echo $linha18['idT_usuario'] ?>">
                                                <input type="text" name="id_usuario" style="display: none;" value="<?php echo $_SESSION['id'] ?>">
                                                <button type="submit" style="background-color: #02ACEB; border:none" class="btn btn-primary">Seguir</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>