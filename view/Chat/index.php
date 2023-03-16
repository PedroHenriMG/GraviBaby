<?php
session_start();
ob_start();


if(!isset($_SESSION['id']) && !isset($_SESSION['nome'] )){
header('Location: ../index.php');
$_SESSION['msg'] = '<p>Erro: Você tem que está logado para acessar o site</p>';
}
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
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

							<div class="d-flex justify-content-start mb-4">
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
							</div>
						</div>

						<!-- Input da Mensagem -->

						<div class="card-footer">
							<form action="">
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

		<script src="../../js_normal/chat.js"></script>
	</body>
</html>