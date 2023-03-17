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
		
        <link rel="stylesheet" href="style.css">
	</head>
    
	<body>

		<?php include_once("../../controller/util_php/infos_usuario_chat.php") ?>


		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
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

							<!-- <div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="<?php 
                    
										if($img != ""){
											echo $img;
										}?>" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									Oi, Já fez as telas Carlos?
									<span class="msg_time">8:40 AM, Today</span>
								</div>
							</div>

							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Opa Pedro, Fazer Agora!
									<span class="msg_time_send">8:55 AM, Today</span>
								</div>
								<div class="img_cont_msg">
									<img src="" class="rounded-circle user_img_msg">
								</div>
							</div>

							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="<?php 

									if($img != ""){
										echo $img;
									}?>	
                    
								" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									Faça e manda no gitHub ainda hoje!
									<span class="msg_time">9:00 AM, Today</span>
								</div>
							</div>
							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Pode deixar patrão!
									<span class="msg_time_send">9:05 AM, Today</span>
								</div>
								<div class="img_cont_msg">
							<img src="" class="rounded-circle user_img_msg">
								</div>
							</div>
							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="<?php 

									if($img != ""){
										echo $img;
									}?>	" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									Mandou?
									<span class="msg_time">11:07 AM, Today</span>
								</div>
							</div>
							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Acabei de mandar
									<span class="msg_time_send">11:10 AM, Today</span>
								</div>
								<div class="img_cont_msg">
						<img src="" class="rounded-circle user_img_msg">
								</div>
							</div>
							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="<?php 

									if($img != ""){
										echo $img;
									}?>	" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									Ok, Até Quarta
									<span class="msg_time">11:12 AM, Today</span>
								</div>
							</div>
							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Até Pedro!
									<span class="msg_time_send">11:15 AM, Today</span>
								</div>
								<div class="img_cont_msg">
						<img src="" class="rounded-circle user_img_msg">
								</div>
							</div> -->
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
										<button onclick="msg()" id="btn_msg" type="submit" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
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
		$idAmigo = 2;
		
		$query9 = "SELECT * FROM T_chat WHERE T_usuario_idT_usuario = $id OR T_usuario_idT_usuario = $idAmigo";
		$prepare9 = $dbh -> prepare($query9);
		$resultado9 = $prepare9->execute();
	
		$res9 =  $prepare9->fetchAll(PDO::FETCH_ASSOC);
		$count9 = $prepare9->rowCount();

		

		$i =0;

		while($i<$count9){
			echo $res9[$i]['mensagem'];

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

		<!-- // $query10 = "SELECT * FROM T_chat WHERE idT_chat = $count9";
		// $prepare10 = $dbh -> prepare($query10);
		// $resultado10 = $prepare10->execute();
	
		// $res10 =  $prepare10->fetch(); -->

		
		<span id="span_msg"> <?php echo $res9[$i]['mensagem'] ?></span>

		<span id="lugarMsg"> <?php echo $lugarMsg ?></span>

		<span id="lugarImgMsg"> <?php echo $imgPerfilMsg ?></span>

		<?php

		$msg2 = $res9[$i]["mensagem"];

		echo "<script type='module'>import {criarMsg} from '../../js_normal/chat.js'; 

		let msg = '$msg2';

		criarMsg(msg);
	  </script>";
		
	  $i++;
		}
		
		?>

<script></script>
		
		<!-- <script>
			const criarMsg = ()=>{

const card_body = document.querySelector("#card_body");
const span_msg = document.querySelector("#span_msg");
const lugarMsg = document.querySelector("#lugarMsg");
const lugarImgMsg = document.querySelector("#lugarImgMsg");

const msg_usuario = span_msg.innerText;
const foto_usuario = lugarImgMsg.innerText;
const direcao = lugarMsg.innerText;

let data =  new Date();

console.log(msg_usuario);
console.log(foto_usuario);
console.log(data.getHours());
console.log(direcao);
console.log(card_body);


// Mensagem da esquerda

if(direcao == 1){

const divEsqMsg = document.createElement('div');

divEsqMsg.classList.add("d-flex");
divEsqMsg.classList.add("justify-content-start");
divEsqMsg.classList.add("mb-4");

const divImgEsqMsg = document.createElement('div');

divImgEsqMsg.classList.add("img_cont_msg");

const imgEsqMsg = document.createElement('img');

imgEsqMsg.classList.add("rounded-circle");
imgEsqMsg.classList.add("user_img_msg");

imgEsqMsg.src = `../${foto_usuario}`;

divImgEsqMsg.appendChild(imgEsqMsg);
divEsqMsg.appendChild(divImgEsqMsg);

const divMsg = document.createElement('div');

divMsg.classList.add("msg_cotainer");

divMsg.innerText = msg_usuario;

const horaMsg = document.createElement('span');

horaMsg.classList.add("msg_time");

horaMsg.innerText = `${ data.getHours()}`;

divMsg.appendChild(horaMsg);
divEsqMsg.appendChild(divMsg);

card_body.appendChild(divEsqMsg);

}

// Mensagem da esquerda

// Mensagem da direita

 else if(direcao == 0){

const divDirMsg = document.createElement('div');

divDirMsg.classList.add("d-flex");
divDirMsg.classList.add("justify-content-end");
divDirMsg.classList.add("mb-4");

const dirMsgSend = document.createElement('div');

dirMsgSend.classList.add("msg_cotainer_send");

dirMsgSend.innerText = msg_usuario;

const horaDirMsg = document.createElement('span');

horaDirMsg.classList.add("msg_time_send");

horaDirMsg.innerText =`${ data.getHours()} : ${data.getMinutes()}`;

dirMsgSend.appendChild(horaDirMsg);
divDirMsg.appendChild(dirMsgSend);

const divDirImg = document.createElement('div');

divDirImg.classList.add("img_cont_msg");

const imgDirMsg = document.createElement("img");

imgDirMsg.classList.add("rounded-circle");
imgDirMsg.classList.add("user_img_msg");

imgDirMsg.src = `../${foto_usuario}`;

divDirImg.appendChild(imgDirMsg);
divDirMsg.appendChild(divDirImg);
card_body.appendChild(divDirMsg);

}

// Mensagem da direita

// window.location.href = "http://localhost/GraviBaby/view/Chat/index.php";
}
		</script> -->

		<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	</body>
</html>