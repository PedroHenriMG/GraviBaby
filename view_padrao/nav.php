<link rel="stylesheet" href="../css_normal/nav_padrao.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<?php include_once('../controller/util_php/infos_usuario.php') ?>

<body>
    <div>
        <nav>
            <ul>
                <li> <a href="../view/chat/index.php"> <span class="material-symbols-outlined">chat</span> </a> </li>
                <li> <a href="../view/dashboard.php"> <span class="material-symbols-outlined">home</span> </a> </li>     
                <li> <a href="/"> <span class="material-symbols-outlined">groups</span> </a> </li>
                <li> 
                <p style="text-align: center; padding-top: 10px; padding-right: 10px"><?php echo $res6['n_usuario']; ?></p>
                    <div class="icon_perfil">
                        <a href="../view/perfil.php" >
                            <img  src="<?php echo $img ?>" alt="">  
                        </a> 
                    </div>
                </li>
            </ul>
            
        </nav>
    </div>
</body>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> <!--entra no site ioicons io pra ver os icones -->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


