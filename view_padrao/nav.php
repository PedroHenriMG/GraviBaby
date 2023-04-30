<link rel="stylesheet" href="../css_normal/nav_padrao.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<body>
    <div>
        <nav>
            <ul>
                <li> Chat <a href="../view/chat/index.php"> <span class="material-symbols-outlined">chat</span> </a> </li>
                <li> Home <a href="../view/dashboard.php"> <span class="material-symbols-outlined">home</span> </a> </li>     
                <li> Fórum <a href="/"> <span class="material-symbols-outlined">groups</span> </a> </li>
                <li> Adicionar Post<a href="../view/adicionar_post.php"> <span class="material-symbols-outlined">add</span> </a> </li>
                <li id="nav_li_perfil"> 
                <p style="text-align: center; padding-top: 10px; padding-right: 10px"><?php echo $_SESSION['n_usuario']; ?></p>
                    <div class="icon_perfil">
                        <a href="../view/perfil.php" >
                            <img  src="<?php echo $_SESSION['foto'] ?>" alt="">  
                        </a> 
                    </div>
                </li>
            </ul>
            
        </nav>
    </div>
</body>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> <!--entra no site ioicons io pra ver os icones -->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


