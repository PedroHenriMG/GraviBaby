<link rel="stylesheet" href="../css_normal/nav.css">

<body>
    <div>
        <nav>
            <ul>
                <li> <a><ion-icon name="person"></ion-icon></a> </li>
                <li> <a> <ion-icon name="person"></ion-icon> </a> </li>     
                <li> <a><ion-icon name="person"></ion-icon> </a> </li>
                <li> <a> <ion-icon name="person"></ion-icon> </a></li>
                <li> <a><ion-icon name="person"></ion-icon> </a> </li>
                <li> <a> <ion-icon name="person"></ion-icon> </a> </li>
                <li> <a><ion-icon name="person"></ion-icon></a> </li>
                <li> <a><ion-icon name="person"></ion-icon></a></li>
                <li> <a> <ion-icon name="person"></ion-icon></a></li>
                <li> <a onclick="redirectPerfil()" ><ion-icon name="person"></ion-icon></a>  </li>
            </ul>
        </nav>
    </div>
</body>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> <!--entra no site ioicons io pra ver os icones -->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script> 
    const redirectPerfil=()=>{
        window.location.href = "../view/perfil.php";
    }
</script>


