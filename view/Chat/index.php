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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<link rel="stylesheet" href="style_chat.css">
</head>

<body>

	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card mb-sm-3 mb-md-0 contacts_card">
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

									$id_amigo = $linha11['id_amigo'];

									$sql19 = "SELECT * FROM T_usuario WHERE idT_usuario = $id_amigo AND idT_usuario != $idChat ";

									$prepare19 = $dbh->prepare($sql19);

									$prepare19->execute();

									$res19 = $prepare19->fetchAll();

									foreach ($res19 as $linha19) {
										$id_usu_geral = $linha19["idT_usuario"];

								?>
										<div class="d-flex bd-highlight contato" id="cont<?php echo $linha19['idT_usuario'] ?>" style="cursor: pointer">
											<form method="post" action="../chat/aba_conversa.php?id_conversa=<?php echo $linha19['idT_usuario'] ?>">
												<input value="<?php echo $linha19['idT_usuario'] ?>" type="submit" class="input_contacts" name="id_conversa">
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
						</ui>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
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
								} ?>
								<img src="<?php

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

						<!-- Exemplo de conversa abaixo, mas da pra fazer loop com dados do banco de dados -->

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


	<script type="module">
		import {
			criarMsg
		} from '../../js_normal/chat.js';

		const card_body = document.getElementById("card_body");

		const scroll = () => {
			card_body.scrollTop = card_body.scrollHeight - card_body.clientHeight;
		}

		setTimeout(scroll, 500);

		let msg_mandadas;

		const loopMsg = (e) => {

			e.preventDefault();

		}

		setInterval(loopMg, 5000);
	</script>

</body>


</html>