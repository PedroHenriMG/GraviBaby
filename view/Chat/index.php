<?php
session_start();
ob_start();


if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
header('Location: ../index.php');
$_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		
        <link rel="stylesheet" href="chat.css">
	</head>
    
	<body>

		<?php include_once("../../controller/util_php/infos_usuario_chat.php") ?>


		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<a href="../perfil.php">Voltar</a>
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
                            <!-- Fazer um loop aqui com os dados do banco de dados -->
						<li class="active">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="<?php 
                    
										if($img != ""){
											echo $img;
										}?>"

										class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span><?php echo $n_usuario ?></span>
									<p><?php echo $n_usuario ?> Online</p>
								</div>
							</div>
						</li>
						</ui>
					</div>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="<?php 
                    
										if($img != ""){
											echo $img;
										}?>"

										class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span><?php echo $n_usuario ?></span>
									<p>57 Mensagens</p>
								</div>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<div id="card_body" class="card-body msg_card_body">

                            <!-- Exemplo de conversa abaixo, mas da pra fazer loop com dados do banco de dados -->

							
						</div>

						<!-- Input da Mensagem -->

						<div class="card-footer">
							<form method="post" action="../../controller/enviar_msg.php">
								<input type="text" name="idUsu" value="<?php echo $_SESSION['id'] ?>" style="display: none;">
								<div class="input-group">
									<div class="input-group-append">
										<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
									</div>

									<input id="input_msg" type="text" name="msg_usuario" class="form-control type_msg" placeholder="Escreva sua mensagem..."></input type="text">

									<div class="input-group-append">
										<button id="btn_msg" type="submit" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		
		$idChat = $_SESSION['id'];
		$idAmigo = 1;
		
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

		echo "<script type='module'>import {criarMsg} from '../../js_normal/chat.js'; 

		let msg = '$msg2';
		let lugarMsg = '$lugarMsg';
		let imgPerfilMsg = '$imgPerfilMsg';

		criarMsg(msg,lugarMsg,imgPerfilMsg);
	  </script>";
		
	  $i++;
		}
		
		?>

<script>

	var card_body = document.getElementById("card_body");

 		const scroll = ()=>{	
			card_body.scrollTop = card_body.scrollHeight - card_body.clientHeight;
		}
		
		setTimeout(scroll,500)</script>
	</body>
</html>