<?php
    
    if($id==1){
        $idAmigo = 2;
    }else{
        $idAmigo = 1;
    }
    
    $loopMsg = $dbh->query("SELECT * FROM T_chat WHERE T_usuario_idT_usuario = $id OR T_usuario_idT_usuario = $idAmigo");
    $loopMsg->execute();


    $count10 = $loopMsg->rowCount();

    if($count10 != $msg_mandadas){
        
    

    $msg_mandadas = $count10;
    

    
    $query9 = "SELECT * FROM T_chat WHERE T_usuario_idT_usuario = $id OR T_usuario_idT_usuario = $idAmigo";
    $prepare9 = $dbh -> prepare($query9);
    $resultado9 = $prepare9->execute();

    $res9 =  $prepare9->fetchAll(PDO::FETCH_ASSOC);
    $count9 = $prepare9->rowCount();

    

    $i =0;

    while($i<$count9){

        for($e=0;$e<10000;$e++){
            
        }
        
        $lugarMsg;
        $imgPerfilMsg = "";
        
        if($res9[$i]['T_usuario_idT_usuario'] ==  $idChat){
            $lugarMsg = 0;

            $query11 = "SELECT * FROM T_foto_perfil WHERE T_usuario_idT_usuario = $idChat";
            $prepare11 = $dbh -> prepare($query11);
            $resultado11 = $prepare11->execute();

            $res11 =  $prepare11->fetch();

            $imgPerfilMsg = $res11['img'];

        }else{
            $lugarMsg = 1;

            $query12 = "SELECT * FROM T_foto_perfil WHERE T_usuario_idT_usuario = $idAmigo";
            $prepare12 = $dbh -> prepare($query12);
            $resultado12 = $prepare12->execute();

            $res12 =  $prepare12->fetch();

            $imgPerfilMsg = $res12['img'];
        }

        

        ?>

        <span id="span_msg" > <?php echo $res9[$i]['mensagem'] ?></span>
    
        <span id="lugarMsg"> <?php echo $lugarMsg ?></span>
    
        <span id="lugarImgMsg"> <?php echo $imgPerfilMsg ?></span>
    
        <?php

    $msg2 = $res9[$i]["mensagem"];

    echo '<script type='module'>import {criarMsg} from '../../js_normal/chat.js'; 

    let msg = '$msg2';
    let lugarMsg = '$lugarMsg';
    let imgPerfilMsg = '$imgPerfilMsg';

    criarMsg(msg,lugarMsg,imgPerfilMsg);
    </script>';
    
    $i++;
    }
}
    
    ?>