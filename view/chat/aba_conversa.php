<?php
session_start();
ob_start();

// Essa é aba que aparece quando a pessoa clica em alguém pra conversar

if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])) {
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<link rel="stylesheet" href="style6.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>

<div class="container-fluid h-100">
		<div class="row justify-content-center container_chat" style="height: 90%;">
		<div class="col-xs-12 col-sm-12 col-lg-12 col-xl-4 chat">
				<div class="card col-10 mt-0 bg-dark m-auto contacts_card">
					<div class="card-header">
						<div class="input-group">
							<div class="row justify-content-center align-items-center mr-1"><a href="../../view/home/home.php"><span style="color:aliceblue;
							" class="material-symbols-outlined">
										<i style="color:aliceblue;" class=" bi bi-arrow-left"></i>
									</span></a></div>


							<form class="m-0 d-flex col-11" method="POST" id="form_pesquisa" action="../chat/pesquisa.php">
								<input style="display: none;" value="<?php echo  $_SESSION['id'] ?>" name="idUsu" id="idUsuPes">
								<input type="text" placeholder="Pesquisar" id="input_pesquisa" name="input_pesquisa" class="form-control search" style="color:black; background-color: black;">


								<div class="input-group-prepend">
									<button style="border-radius: 0 15px 15px 0; background-color: #343a40;" type="submit"><span class="input-group-text search_btn"><i style="color: aliceblue;" class="bi bi-search"></i></span></button>
								</div>
							</form>
						</div>
					</div>
					<div class="card-body contacts_body bg-dark">
						<ui class="contacts ">
			
							<li class="active">

								<?php

								// Pegando o id do amigo pelo metodo get

								if (isset($_GET["id_conversa"])) {
									$id_conversa = $_GET["id_conversa"];
									$idAmigo = $id_conversa;
								}

								include_once("../../config.php");

								$idChat = $_SESSION['id'];


								$sql11 = "SELECT * FROM T_amigos WHERE id_usuario = $idChat";

								$prepare11 = $dbh->prepare($sql11);
								$prepare11->execute();

								while ($linha11 = $prepare11->fetch(PDO::FETCH_ASSOC)) {

									$id_amigo2 = $linha11['id_amigo'];

									$sql19 = "SELECT * FROM T_usuario WHERE idT_usuario = $id_amigo2 AND idT_usuario != $idChat ";

									$prepare19 = $dbh->prepare($sql19);

									$prepare19->execute();

									$res19 = $prepare19->fetchAll();

									foreach ($res19 as $linha19) {
										$id_usu_geral = $linha19["idT_usuario"];

								?>
										<div class="d-flex bd-highlight mb-4 contato" id="cont<?php echo $linha19['idT_usuario'] ?>" style="cursor: pointer">
											<form method="post" action="../chat/aba_conversa.php?id_conversa=<?php echo $linha19['idT_usuario'] ?>">
												<input style="display: none;" value="<?php echo $linha19['idT_usuario'] ?>" type="submit" class="input_contacts" name="id_conversa">
											</form>

											<script>

												// Script simples pra quando clicar na pessoa ir para aba_converso só que passando o id dela

												const contato<?php echo $linha19['idT_usuario'] ?> = document.getElementById("cont<?php echo $linha19['idT_usuario'] ?>");

												contato<?php echo $linha19['idT_usuario'] ?>.addEventListener("click", () => {
													window.location = "../chat/aba_conversa.php?id_conversa=<?php echo $linha19['idT_usuario'] ?>";
												})
											</script>

											<div class="img_cont">

												<img src="<?php

															if ($linha19['foto'] != "") {
																echo "../" . $linha19['foto'];
															} else {
																echo "../../fotos_perfil/padrao.jpg";
															}  ?>" class="rounded-circle user_img">
												<span style="background-color:
												
												<?php if ($linha19['status'] != 1) {
														echo "gray";
													} else {
														echo "green";
													} ?>
												
												;"  class="online_icon"></span>
											</div>
											<div class="user_info">
												<span><?php echo $linha19['n_usuario'] ?></span>
												<p>
													<?php echo $linha19['n_usuario'] ?>
													<?php if ($linha19['status'] != 1) {
														echo "Offline";
													} else {
														echo "Online";
													} ?>
												</p>
											</div>
										</div>

								<?php }
								} ?>

							</li>
						</ui>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="col-md-10 col-xl-6 chat">
				<div class="card">
					<div class="card-header msg_head">
						<div class="d-flex bd-highlight">
							<div class="img_cont">
								<?php

								include_once '../../config.php';

								// Pegando informações do amigo para fazer o card dele

								$id_usuario = $_SESSION['id'];

								$sql20 = "SELECT * FROM T_usuario WHERE idT_usuario = $idAmigo";

								$prepare20 = $dbh->prepare($sql20);

								$prepare20->execute();

								$res20 = $prepare20->fetchAll();

								// Loop para criar o card do topo 

								foreach ($res20 as $linha20) {

									$id_usu_geral = $linha20["idT_usuario"];
									$n_usuario = $linha20['n_usuario'];
									$img = $linha20['foto'];
								} ?>
								<img src="<?php
											if ($img != "") {
												echo "../" . $img;
											} else {
												echo "../../fotos_perfil/padrao.jpg";
											}   ?>" class="rounded-circle user_img">
								<span  style="background-color:
												
												<?php if ($linha19['status'] != 1) {
														echo "gray";
													} else {
														echo "green";
													} ?>
												
												;"  class="online_icon"></span>
							</div>
							<div class="user_info">
								<span><?php echo $n_usuario ?></span>
								<p>57 Mensagens</p>
							</div>
							<div class="video_cam">
								<span><i style="color: aliceblue;" class="fas fa-video"></i></span>
								<span><i style="color: aliceblue;" class="fas fa-phone"></i></span>
							</div>
						</div>
						<span id="action_menu_btn"><i style="color: aliceblue; display:none;" class="fas fa-arrow-left"></i></span>
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

						<?php

						include_once("../../config.php");

						$id = $_SESSION['id'];

						// Verificando se o metodo get mandou algum id

						if ($idAmigo != null) {

							// Pegando todas as mensagens mandadas entre vc e o amigo selecionado

							$loopMsg = $dbh->query("SELECT * FROM T_chat WHERE remetente = $id AND destinatario = $idAmigo OR remetente = $idAmigo AND destinatario = $id");
							$loopMsg->execute();

							$count10 = $loopMsg->rowCount();

							$msg_mandadas = $count10;

							$idChat = $_SESSION['id'];

							if ($count10 == $msg_mandadas) {

								$msg_mandadas = $count10;

								// Pegando todas as mensagens mandadas entre vc e o amigo selecionado e ordenando pelo id

								$query9 = "SELECT * FROM T_chat WHERE remetente = $id AND destinatario = $idAmigo OR remetente = $idAmigo AND destinatario = $id ORDER BY idT_chat";
								$prepare9 = $dbh->prepare($query9);
								$resultado9 = $prepare9->execute();

								$res9 =  $prepare9->fetchAll(PDO::FETCH_ASSOC);
								$count9 = $prepare9->rowCount();

								$i = 0;

								// Fazendo loop para criar os cards das mensagens

								foreach ($res9 as $linha9) {

									$lugarMsg;
									$imgPerfilMsg = "";

									// Vendo o lugar onde vai aparecer cada mensagem

									if ($linha9['remetente'] ==  $idChat) {

										include_once '../../config.php';

										$id_usuario = $_SESSION['id'];

										$sql21 = "SELECT * FROM T_usuario WHERE idT_usuario = $id_usuario ";

										$prepare21 = $dbh->prepare($sql21);

										$prepare21->execute();

										$res21 = $prepare21->fetchAll();

										foreach ($res21 as $linha21) {
											$id_usu_geral = $linha21["idT_usuario"];

											if ($linha21['foto'] == "") {
												$imgPerfilMsg = "../fotos_perfil/padrao.jpg";
											} else {
												$imgPerfilMsg = $linha21['foto'];
											}
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

											if ($linha21['foto'] == "") {
												$imgPerfilMsg = "../fotos_perfil/padrao.jpg";
											} else {
												$imgPerfilMsg = $linha21['foto'];
											}
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
					</div>

					<!-- Form para mandar mensagem -->

					<div class="card-footer">
						<form method="post" action="../../controller/enviar_msg.php?id_conversa=<?php echo $idAmigo ?>">
							<input type="text" name="idUsu" value="<?php echo $_SESSION['id'] ?>" style="display: none;">
							<input type="text" name="id_amigo" value="<?php echo $id_amigo ?>" style="display: none;">
							<div class="input-group " style="background-color:aliceblue; border-radius: 15px">
								<div class="input-group-append">
									<span color:black" class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
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


	<script type="module">
		
		const card_body = document.getElementById("card_body");

		// Script para descer o scroll das mensagens

		const scroll = () => {
			card_body.scrollTop = card_body.scrollHeight - card_body.clientHeight;
		}

		setTimeout(scroll, 500);

	</script>

</body>


</html>