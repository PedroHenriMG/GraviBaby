<?php
session_start();
ob_start();


if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Perfil
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />

    <link rel="stylesheet" href="../css_normal/perfil1.css">

    <!-- Icone de direct  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Icone de direct  -->
</head>

<body class="g-sidenav-show" style="background-color: #F28DB2;">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Nav Bar -->

        <?php include_once("../view_padrao/nav.php") ?>

        <!-- End Nav Bar -->

        <div id="contaner_topo" class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">GraviBaby</h3>
                        </div>
                        <button type="button" id="btn_mensagens" class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <span class="btn-inner--icon">
                                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                                    <span class="visually-hidden">New</span>
                                </span>
                            </span>
                            <span class="btn-inner--text">Messages</span>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-0">



        </div>
        <!-- Main do perfil -->

        <?php
        include_once("../config.php");
        $id = $_SESSION['id'];
        ?>

        <section class="body_perfil">
            <section class="main_perfil">

                <div class="section_infos_perfil">
                    <div class="foto_perfil">
                        <?php

                        include_once("../controller/util_php/infos_usuario.php");
                        ?>
                        <img id="img_perfil" src="<?php

                                                    $id = $_SESSION['id'];

                                                    include_once '../config.php';
                                                    $sql24 = "SELECT foto FROM T_usuario WHERE idT_usuario = $id ";
                                                    $prepare24 = $dbh->prepare($sql24);
                                                    $res24 = $prepare24->execute();
                                                    $linha24 = $prepare24->fetch();

                                                    echo $linha24['foto'] ?>" alt="">
                    </div>
                    <div class="infos_perfil">
                        <div class="topo_infos_perfil">

                            <?php
                            include_once("../config.php");
                            $id = $_SESSION['id'];

                            $sql1 = "SELECT nomecompleto_usuario,n_usuario,email,senha FROM T_usuario WHERE idT_usuario = $id";
                            $resultado = $dbh->prepare($sql1);
                            $resultado->execute();

                            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                if (null == null) {
                                    $linha['publicacoes'] = 0;
                                }
                                if (null == null) {
                                    $linha['seguidores'] = 0;
                                }
                                if (null == null) {
                                    $linha['seguindo'] = 0;
                                }

                            ?>

                                <h3><?php echo $linha['n_usuario'] ?></h3>
                                <button class="btn_editar_perfil" onclick="irEditarPerfil()"><span id="titulo_btn_editar_perfil">Editar Perfil</span><span id="icon_editar_perfil" class="material-symbols-outlined">edit</span></button>
                                <span id="icon_config" class="material-symbols-outlined" onclick="irChat()">near_me</span>
                                <span id="icon_config" class="material-symbols-outlined" onclick="sairSessao()">close</span>
                        </div>

                        <div class="infos_gerais_perfil">
                            <h5 class="gerais"><?php echo $linha['publicacoes'] ?> publicações</h5>
                            <h5 class="gerais"><?php echo $linha['seguidores'] ?> seguidores</h5>
                            <h5 class="gerais"><?php echo $linha['seguindo'] ?> seguindo</h5>
                        </div>

                        <div class="bio_perfil">
                            <h5 class="infos_bio_perfil"><?php echo $linha['nomecompleto_usuario'] ?></h5>
                            <h5 class="infos_bio_perfil">

                            </h5>
                            <h5 class="infos_bio_perfil"></h5>
                            <h5 class="infos_bio_perfil"></h5>
                        </div>
                    </div>

                <?php } ?>

                </div>

                <hr>

                <div class="atividades">
                    <div class="atividade_perfil">
                        <i></i>
                        <span>PUBLICAÇÕES</span>
                    </div>
                    <div class="atividade_perfil">
                        <i></i>
                        <span>SALVOS</span>
                    </div>
                    <div class="atividade_perfil">
                        <i></i>
                        <span>MARCADOS</span>
                    </div>
                </div>

                <?php

                include_once("../config.php");
                $id = $_SESSION['id'];


                $query16 = "SELECT foto FROM T_publicacoes WHERE id_usuario= $id";
                $prepare16 = $dbh->prepare($query16);
                $resultado16 = $prepare16->execute();

                $res16 = $prepare16->fetchAll();

                ?>

                <div class="posts_perfil">

                    <?php

                    foreach ($res16 as $linha16) {

                    ?>

                        <div class="post"><img src=" <?php if ($linha16['foto'] == null) {
                                                            echo "";
                                                        } else {
                                                            echo $linha16['foto'];
                                                        }
                                                        ?>" alt=""></div>

                    <?php } ?>

                </div>



            </section>
        </section>

        <!-- Fim do Main do perfil -->


    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="../assets/js/plugins/swiper-bundle.min.js" type="text/javascript"></script>
    <script>
        if (document.getElementsByClassName('mySwiper')) {
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                initialSlide: 1,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        };


        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
                datasets: [{
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderSkipped: false,
                        backgroundColor: "#2ca8ff",
                        data: [450, 200, 100, 220, 500, 100, 400, 230, 500, 200],
                        maxBarThickness: 6
                    },
                    {
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderSkipped: false,
                        backgroundColor: "#7c3aed",
                        data: [200, 300, 200, 420, 400, 200, 300, 430, 400, 300],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#1e293b',
                        bodyColor: '#1e293b',
                        borderColor: '#e9ecef',
                        borderWidth: 1,
                        usePointStyle: true
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        stacked: true,
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                        },
                        ticks: {
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        },
                    },
                    x: {
                        stacked: true,
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(45,168,255,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(45,168,255,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(45,168,255,0)'); //blue colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(119,77,211,0.4)');
        gradientStroke2.addColorStop(0.7, 'rgba(119,77,211,0.1)');
        gradientStroke2.addColorStop(0, 'rgba(119,77,211,0)'); //purple colors

        new Chart(ctx2, {
            plugins: [{
                beforeInit(chart) {
                    const originalFit = chart.legend.fit;
                    chart.legend.fit = function fit() {
                        originalFit.bind(chart.legend)();
                        this.height += 40;
                    }
                },
            }],
            type: "line",
            data: {
                labels: ["Aug 18", "Aug 19", "Aug 20", "Aug 21", "Aug 22", "Aug 23", "Aug 24", "Aug 25", "Aug 26", "Aug 27", "Aug 28", "Aug 29", "Aug 30", "Aug 31", "Sept 01", "Sept 02", "Sept 03", "Aug 22", "Sept 04", "Sept 05", "Sept 06", "Sept 07", "Sept 08", "Sept 09"],
                datasets: [{
                        label: "Volume",
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 3,
                        borderColor: "#2ca8ff",
                        pointBorderColor: '#2ca8ff',
                        pointBackgroundColor: '#2ca8ff',
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [2828, 1291, 3360, 3223, 1630, 980, 2059, 3092, 1831, 1842, 1902, 1478, 1123, 2444, 2636, 2593, 2885, 1764, 898, 1356, 2573, 3382, 2858, 4228],
                        maxBarThickness: 6

                    },
                    {
                        label: "Trade",
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 3,
                        borderColor: "#832bf9",
                        pointBorderColor: '#832bf9',
                        pointBackgroundColor: '#832bf9',
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [2797, 2182, 1069, 2098, 3309, 3881, 2059, 3239, 6215, 2185, 2115, 5430, 4648, 2444, 2161, 3018, 1153, 1068, 2192, 1152, 2129, 1396, 2067, 1215, 712, 2462, 1669, 2360, 2787, 861],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            boxWidth: 6,
                            boxHeight: 6,
                            padding: 20,
                            pointStyle: 'circle',
                            borderRadius: 50,
                            usePointStyle: true,
                            font: {
                                weight: 400,
                            },
                        },
                    },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#1e293b',
                        bodyColor: '#1e293b',
                        borderColor: '#e9ecef',
                        borderWidth: 1,
                        pointRadius: 2,
                        usePointStyle: true,
                        boxWidth: 8,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            callback: function(value, index, ticks) {
                                return parseInt(value).toLocaleString() + ' EUR';
                            },
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
    <script>
        const irEditarPerfil = () => {
            window.location.href = "./editar.php";
        }

        const irChat = () => {
            window.location.href = "./chat/index.php";
        }

        const sairSessao = () => {
            window.location.href = "../controller/sair_sessao.php";
        }
    </script>
</body>

</html>