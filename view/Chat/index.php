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
		
        <link rel="stylesheet" href="style_chat.css">
	</head>
    
	<body>

		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<div class="btn_voltar"><a href="../perfil.php">Voltar</a></div>
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

						<?php

						include_once("../../config.php");

						$idChat = $_SESSION['id'];
						
						
						$sql11 = "SELECT * FROM T_amigos WHERE id_usuario = $idChat";

						$prepare11 = $dbh->prepare($sql11);
						$prepare11->execute();

						while($linha11 = $prepare11->fetch(PDO::FETCH_ASSOC)){

							$id_amigo = $linha11['id_amigo'];

							$sql19 = "SELECT * FROM T_usuario WHERE idT_usuario  = $id_amigo AND idT_usuario != $idChat ";

							$prepare19 = $dbh->prepare($sql19);
			
							$prepare19->execute();
			
							$res19 = $prepare19->fetchAll();
			
							foreach ($res19 as $linha19) {
								$id_usu_geral = $linha19["idT_usuario"];
						
						?>
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									
									<img src="<?php 
                    
										if($linha19['foto'] != ""){
											echo "../". $linha19['foto'];
										}?>"

										class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span><?php echo $linha19['n_usuario'] ?></span>
									<p>
										<?php echo $linha19['n_usuario'] ?> <?php if($linha19['status'] != 1){
										echo "Offiline";
										}else{
											echo "Online";
										} ?> 
										</p>
								</div>
							</div>

<<<<<<< HEAD
									$sql19 = "SELECT * FROM T_usuario WHERE idT_usuario = $id_amigo AND idT_usuario != $idChat ";

									$prepare19 = $dbh->prepare($sql19);

									$prepare19->execute();

									$res19 = $prepare19->fetchAll();

									foreach ($res19 as $linha19) {
										$id_usu_geral = $linha19["idT_usuario"];

								?>
										<div class="d-flex bd-highlight contato" id="cont<?php echo $linha19['idT_usuario'] ?>" style="cursor: pointer">
											<form method="post">
												<input value="<?php echo $linha19['idT_usuario'] ?>" type="button" class="input_contacts form_idConversa " name="id_conversa">
											</form>

											<div class="img_cont">

												<img src="<?php

															if ($linha19['foto'] != "") {
																echo "../" . $linha19['foto'];
															} ?>" class="rounded-circle user_img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span><?php echo $linha19['n_usuario'] ?></span>
												<p>
													<?php echo $linha19['n_usuario'] ?> <?php if ($linha19['status'] != 1) {
																							echo "Offiline";
																						} else {
																							echo "Online";
																						} ?>
												</p>
											</div>
										</div>

								<?php }
								} ?>

							</li>
=======
							<?php } } ?>
							
						</li>
>>>>>>> parent of 62a1b3c (chat terminado, eu acho...  tomára.)
						</ui>
					</div>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
								<?php

									include_once '../../config.php';

									$id_usuario = $_SESSION['id'];

									$sql20 = "SELECT * FROM T_usuario WHERE idT_usuario = $idChat";

									$prepare20 = $dbh->prepare($sql20);

									$prepare20->execute();

									$res20 = $prepare20->fetchAll();

									foreach ($res20 as $linha20) {

										$id_usu_geral = $linha20["idT_usuario"];
										$n_usuario = $linha20['n_usuario'];
										$img = $linha20['foto'];
									}?>
									<img src="<?php 
                    
										if($img != ""){
											echo "../".$img;
										}?>"

<<<<<<< HEAD
											if ($img != "") {
												echo "../" . $img;
											} ?>" class="rounded-circle user_img">
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

					</div>

					<!-- Input da Mensagem -->

					<div class="card-footer">
						<form method="post" action="../../controller/enviar_msg.php">
							<input type="text" name="idUsu" value="<?php echo $_SESSION['id'] ?>" style="display: none;">
							<input type="text" name="id_amigo" value="<?php echo $id_amigo ?>" style="display: none;">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
=======
										class="rounded-circle user_img">
									<span class="online_icon"></span>
>>>>>>> parent of 62a1b3c (chat terminado, eu acho...  tomára.)
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
							<?php 

include_once("../../config.php");


	$id = $_SESSION['id'];
									
	if($id==1){
	$idAmigo = 2;
	}else{
	$idAmigo = 1;
	}

	$loopMsg = $dbh->query("SELECT * FROM T_chat WHERE remetente = $id AND destinatario = $idAmigo OR remetente = $idAmigo AND destinatario = $id");
		$loopMsg->execute();

		$count10 = $loopMsg->rowCount();

		$msg_mandadas = $count10;

    $idChat = $_SESSION['id'];

    if($count10 == $msg_mandadas){


    $msg_mandadas = $count10;

    $query9 = "SELECT * FROM T_chat WHERE remetente = $id AND destinatario = $idAmigo OR remetente = $idAmigo AND destinatario = $id ORDER BY idT_chat";
    $prepare9 = $dbh -> prepare($query9);
    $resultado9 = $prepare9->execute();

    $res9 =  $prepare9->fetchAll(PDO::FETCH_ASSOC);
    $count9 = $prepare9->rowCount();

    $i = 0;

    foreach($res9 as $linha9){

    $lugarMsg;
    $imgPerfilMsg = "";

    if($linha9['remetente'] ==  $idChat){

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

    }else{

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

    ?>
						</div>

						<!-- Input da Mensagem -->

						<div class="card-footer">
							<form method="post" action="../../controller/enviar_msg.php">
								<input type="text" name="idUsu" value="<?php echo $_SESSION['id'] ?>" style="display: none;">
								<input type="text" name="id_amigo" value="<?php echo $id_amigo ?>" style="display: none;">
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

		<p id="local_msg"></p>

<<<<<<< HEAD
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="../../js_normal/master.js"></script>
=======

<script type = "module">
	import {criarMsg} from '../../js_normal/chat.js';

	const card_body = document.getElementById("card_body");

 		const scroll = ()=>{	
			card_body.scrollTop = card_body.scrollHeight - card_body.clientHeight;
		}
		
		setTimeout(scroll,500);

		let msg_mandadas;

		const loopMsg=(e)=>{
		
			e.preventDefault();
			
		}

		setInterval(loopMg,5000);
		
	</script>
>>>>>>> parent of 62a1b3c (chat terminado, eu acho...  tomára.)

	</body>

	
</html>