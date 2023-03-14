
<?php
session_start();
ob_start();


if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
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

<link rel="stylesheet" href="../css_normal/editar.css">

<!-- Icone de config  -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<!-- Icone de config  -->
</head>

<body class="g-sidenav-show" style="background-color: #F28DB2;">

<!-- Menu -->

<?php include_once("../view_padrao/menu.php") ?>

<!-- End Menu -->

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<div class="container-fluid py-4 px-5">
    <div class="row">
    <div class="col-md-12">
        <div class="d-md-flex align-items-center mb-3 mx-2">
        <div class="mb-md-0 mb-3">
            <h3 class="font-weight-bold mb-0">GraviBaby</h3>
        </div>
        <button type="button" class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
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
        <h2>Editar Perfil</h2>
        <div class="section_infos_perfil">
            
            <div class="infos_perfil">
                <div class="editar_foto_perfil">
                    <div class="nome_infos_perfil">
                        <h5 id="nome_editar_foto" class="nomes_editar">Foto:</h5>
                    </div>
                    
                </div>
                <form enctype="multipart/form-data"  method="post" action="../controller/editar_perfil.php">

                <?php 

                    include_once("../controller/util_php/infos_usuario.php");                     
                            
                ?>

                <div class="foto_perfil">
                    <img id="img_perfil" src=" <?php 
                    
                    if($img != ""){
                        echo $img;
                    }
                    
                     ?>" alt="">
                    <input id="trocar_foto_perfil" name="arquivo" type="file">
                </div>

                    
                    <?php 

                        $query = "SELECT nomeCompleto_usuario,n_usuario,email,senha,publicacoes,seguidores,seguindo,bio1,bio2,bio3 FROM T_usuario WHERE idT_usuario = $id";
                        $resultado = $dbh -> prepare($query);
                        $resultado->execute();
                        
                        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){                         
                            
                    ?>

                    <div class="input_editar_perfil">
                        <label for="n_usuario"><h5>Nome de Usuário:</h5></label>

                        <input name="n_usuario" type="text" value="<?php echo $linha['n_usuario'] ?>">

                        <label for="email"><h5>Email:</h5></label>

                        <input name="email" type="text" value="<?php echo $linha['email'] ?>">

                        <label for="senha"><h5>Senha:</h5></label>

                        <input name="senha" type="text" value="<?php echo $linha['senha'] ?>">

                        <label for="nome_completo"><h5>Nome Completo:</h5></label>

                        <input name="nome_completo" type="text" value="<?php echo $linha['nomeCompleto_usuario'] ?>">

                        <label for="bio1"><h5>Bio1:</h5></label>

                        <input name="bio1" type="text" value="<?php echo $linha['bio1'] ?>">

                        <label for="bio2"><h5>Bio2:</h5></label>

                        <input name="bio2" type="text" value="<?php echo $linha['bio2'] ?>">

                        <label for="bio3"><h5>Bio3:</h5></label>

                        <input name="bio3" type="text" value="<?php echo $linha['bio3'] ?>">

                        <input name="id" value="<?php echo $id; ?>" style="display: none;">
                    </div>

                    <?php } ?>

                    <div class="salvar_editar_perfil">
                        <input type="submit" value="Salvar">
                    </div>

                </form>
            </div>
            </div>
        </div>

        <hr>

        <div class="btn_deletar_conta">
            <form method="post" action="../controller/deletar_conta.php">
                <input name="id_deletar" value="<?php echo $id; ?>" style="display: none;">
                <input type="submit" value="Deletar Conta">
            </form>
                
            </div>
    </section>
    <div></div>
</section>

<!-- Fim do Main do perfil -->

<!-- Footer -->

<?php include_once("../view_padrao/footer.php") ?>

<!-- End Footer -->
</main>
<div class="fixed-plugin">
<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
    <i class="fa fa-cog py-2"></i>
</a>
<div class="card shadow-lg ">
    <div class="card-header pb-0 pt-3 ">
    <div class="float-start">
        <h5 class="mt-3 mb-0">Corporate UI Configurator</h5>
        <p>See our dashboard options.</p>
    </div>
    <div class="float-end mt-4">
        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
        <i class="fa fa-close"></i>
        </button>
    </div>
    <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0">
    <!-- Sidebar Backgrounds -->
    <div>
        <h6 class="mb-0">Sidebar Colors</h6>
    </div>
    <a href="javascript:void(0)" class="switch-trigger background-color">
        <div class="badge-colors my-2 text-start">
        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
    </a>
    <!-- Sidenav Type -->
    <div class="mt-3">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="text-sm">Choose between 2 different sidenav types.</p>
    </div>
    <div class="d-flex">
        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900" onclick="sidebarType(this)">Dark</button>
        <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
    </div>
    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
    <!-- Navbar Fixed -->
    <div class="mt-3">
        <h6 class="mb-0">Navbar Fixed</h6>
    </div>
    <div class="form-check form-switch ps-0">
        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
    </div>
    <hr class="horizontal dark my-sm-4">
    <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/corporate-ui-dashboard">Free Download</a>
    <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/corporate-ui-dashboard">View documentation</a>
    <div class="w-100 text-center">
        <a class="github-button" href="https://github.com/creativetimofficial/corporate-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/corporate-ui-dashboard on GitHub">Star</a>
        <h6 class="mt-3">Thank you for sharing!</h6>
        <a href="https://twitter.com/intent/tweet?text=Check%20Corporate%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fcorporate-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/corporate-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
        </a>
    </div>
    </div>
</div>
</div>
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

</body>

</html>