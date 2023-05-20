<?php
session_start();
ob_start();


if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
    header('Location: ../index.php');
    $_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}

include_once("../../config.php");

$idAmigo = filter_input(INPUT_POST, 'id_conversa', FILTER_SANITIZE_STRING);

$id = $_SESSION['id'];

if (isset($_GET["id_conversa"])) {
    $id_conversa = $_GET["id_conversa"];
    $idAmigo = $id_conversa;
}

if ($idAmigo != null) {

    $loopMsg = $dbh->query("SELECT * FROM T_chat WHERE remetente = $id AND destinatario = $idAmigo OR remetente = $idAmigo AND destinatario = $id");
    $loopMsg->execute();

    $count10 = $loopMsg->rowCount();

    $msg_mandadas = $count10;

    $idChat = $_SESSION['id'];

    if ($count10 == $msg_mandadas) {


        $msg_mandadas = $count10;

        $query9 = "SELECT * FROM T_chat WHERE remetente = $id AND destinatario = $idAmigo OR remetente = $idAmigo AND destinatario = $id ORDER BY idT_chat";
        $prepare9 = $dbh->prepare($query9);
        $resultado9 = $prepare9->execute();

        $res9 =  $prepare9->fetchAll(PDO::FETCH_ASSOC);
        $count9 = $prepare9->rowCount();

        $i = 0;

        foreach ($res9 as $linha9) {

            $lugarMsg;
            $imgPerfilMsg = "";

            if ($linha9['remetente'] ==  $idChat) {

                include_once '../../config.php';

                $id_usuario = $_SESSION['id'];

                $sql21 = "SELECT * FROM T_usuario WHERE idT_usuario = $id_usuario ";

                $prepare21 = $dbh->prepare($sql21);

                $prepare21->execute();

                $res21 = $prepare21->fetchAll();

                foreach ($res21 as $linha21) {
                    $id_usu_geral = $linha21["idT_usuario"];

                    $imgPerfilMsg = $linha21['foto'];
                }

?>
                <div class="d-flex justify-content-end mb-4">
                    <div class="img_cont_msg">
                        <img src="<?php echo "../" . $imgPerfilMsg ?>" alt="" class="rounded-circle user_img_msg">
                    </div>
                    <div class="msg_cotainer msg_cotainer_send"><?php echo $linha9['mensagem'] ?></div>
                </div>

            <?php

            } else {

                include_once '../../config.php';

                $id_usuario = $_SESSION['id'];

                $sql21 = "SELECT * FROM T_usuario WHERE idT_usuario = $idAmigo ";

                $prepare21 = $dbh->prepare($sql21);

                $prepare21->execute();

                $res21 = $prepare21->fetchAll();

                foreach ($res21 as $linha21) {
                    $id_usu_geral = $linha21["idT_usuario"];

                    $imgPerfilMsg = $linha21['foto'];
                }
            ?>

                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="<?php echo "../" . $imgPerfilMsg ?>" alt="" class="rounded-circle user_img_msg">
                    </div>
                    <div class="msg_cotainer"><?php echo $linha9['mensagem'] ?></div>
                </div>

            <?php } ?>

<?php

        }
    }
}

?>