<?php
session_start();
ob_start();


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

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="style6.css">
</head>

<body style="background-image: linear-gradient(to right, #BE408C, #4456A0); height: 100vh; width: 100vw;">

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

									<!-- Form para pesquisar somente entre os seus amigos -->

							<form class="m-0 d-flex col-11" method="POST" id="form_pesquisa" action="../chat/pesquisa.php">
								<input style="display: none;" value="<?php echo  $_SESSION['id'] ?>" name="idUsu" id="idUsuPes">
								<input type="text" placeholder="Pesquisar" id="input_pesquisa" name="input_pesquisa" class="form-control search" style="color:black; background-color: black;">


								<div class="input-group-prepend">
									<button style="border-radius: 0 15px 15px 0; background-color: #343a40;" type="submit"><span class="input-group-text search_btn"><i style="color: aliceblue;" class="bi bi-search"></i></span></button>
								</div>
							</form>
						</div>
					</div>
					<div class="card-body col-12 bg-dark contacts_body">
						<ui class="contacts res_contacts">

							<!-- Loop com os seus amigos -->
							<li class="active">

								<?php

								if (isset($_POST["id_conversa"])) {
									$id_conversa = $_POST["id_conversa"];
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
										<div class="d-flex bd-highlight contato mb-4" id="cont<?php echo $linha19['idT_usuario'] ?>" style="cursor: pointer">
											<form method="post" action="../chat/aba_conversa.php?id_conversa=<?php echo $linha19['idT_usuario'] ?>">
												<input style="display: none;" value="<?php echo $linha19['idT_usuario'] ?>" type="submit" class="input_contacts" name="id_conversa">
											</form>

											<script>
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
												
												;" class="online_icon"></span>
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
						</ui>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="col-md-10 col-xl-6 chat">
				<div class="card">

					<div id="card_body" class="card-body msg_card_body">

					</div>

					<!-- Input da Mensagem -->

					<div class="card-footer">
						<form method="post" action="">
							<input type="text" name="idUsu"  style="display: none;">
							<input type="text" name="id_amigo"  style="display: none;">
							<div class="input-group " style="background-color:aliceblue; border-radius: 15px">
								<div class="input-group-append">
									<span style="color:black" class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
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
		import {
			criarMsg
		} from '../../js_normal/chat.js';

		const card_body = document.getElementById("card_body");

		const scroll = () => {
			card_body.scrollTop = card_body.scrollHeight - card_body.clientHeight;
		}

		setTimeout(scroll, 500);
	</script>

</body>


</html>