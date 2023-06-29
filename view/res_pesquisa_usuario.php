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
	<link rel="stylesheet" href="../view/chat/style6.css">
	<link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
</head>

<body style="height: 100vh; width: 100vw; background-color:rgb(109, 108, 106);">

	<div class="container-fluid h-100">
		<div class="row justify-content-center container_chat" style="height: 90%;">
			<div class=" col-12 chat">
				<div style="height: 80%;" class="card col-10 mt-0 bg-dark m-auto contacts_card">
					<div class="card-header">
						<div class="input-group row">
							<div class="row justify-content-center align-items-center mr-1 col-2"><a href="../view/home/home.php"><span style="color:aliceblue;
							" class="material-symbols-outlined">
										<i style="color:aliceblue;" class=" bi bi-arrow-left"></i>
									</span></a></div>

							<form class="m-0 d-flex col-10" method="POST" id="form_pesquisa" action="./res_pesquisa_usuario.php">
								<input style="display: none;" value="<?php echo  $_SESSION['id'] ?>" name="idUsu" id="idUsuPes">
								<input type="text" placeholder="Pesquisar" id="input_pesquisa" name="input_pesquisa" class="form-control search" style="color:black; background-color: black;">

								<div class="input-group-prepend ">
									<button style="border-radius: 0 15px 15px 0; background-color: #343a40;" type="submit"><span class="input-group-text search_btn"><i style="color: aliceblue;" class="bi bi-search"></i></span></button>
								</div>
							</form>
						</div>
					</div>
					<div class="card-body bg-dark contacts_body">
						<ui class="contacts res_contacts">

							<li class="active">

								<?php

								if (isset($_POST["id_conversa"])) {
									$id_conversa = $_POST["id_conversa"];
									$idAmigo = $id_conversa;
								}

								$id_geral = $_SESSION['id'];

								include_once("../config.php");

								$input_pesquisa = $_POST['input_pesquisa'];

									$sql19 = "SELECT * FROM T_usuario WHERE n_usuario LIKE '%$input_pesquisa%' AND idT_usuario != $id_geral OR nomecompleto_usuario LIkE '%$input_pesquisa%' AND idT_usuario != $id_geral ";

									$prepare19 = $dbh->prepare($sql19);

									$prepare19->execute();

									$res19 = $prepare19->fetchAll();

									if ($prepare19->rowCount() == 0) {
										echo "<h3>Pesquisa não encontrada</h3>";
										die;
									}

									foreach ($res19 as $linha19) {
										$id_usu_geral = $linha19["idT_usuario"];

								?>
										<div class="d-flex bd-highlight contato mb-4" id="cont<?php echo $linha19['idT_usuario'] ?>" style="cursor: pointer">
											<form method="post" action="../view/perfilamigo.php?id_perfil=<?php echo $linha19['idT_usuario'] ?>">
												<input style="display: none;" value="<?php echo $linha19['idT_usuario'] ?>" type="submit" class="input_contacts" name="id_conversa">
											</form>

											<script>
												const contato<?php echo $linha19['idT_usuario'] ?> = document.getElementById("cont<?php echo $linha19['idT_usuario'] ?>");

												contato<?php echo $linha19['idT_usuario'] ?>.addEventListener("click", () => {
													window.location = "../view/perfilamigo.php?id_perfil=<?php echo $linha19['idT_usuario'] ?>";
												})
											</script>

											<div class="img_cont">

												<img style="width: 4rem; height:4rem;" src="<?php

															if ($linha19['foto'] != "") {
																echo "" . $linha19['foto'];
															} else {
																echo "../fotos_perfil/padrao.jpg";
															}  ?>" class="rounded-circle user_img">
												<span style="background-color:
												
												<?php if ($linha19['status'] != 1) {
														echo "#D6D1A4";
													} else {
														echo "#21D701";
													} ?>
												
												; width: 1rem;"  class="online_icon"></span>
											</div>
											<div class="user_info">
												<span style="font-size: 1.2rem;"><?php echo $linha19['n_usuario'] ?></span>
												<p class="display-1" style="color: #C6C8BF; font-size: 0.8rem;">
													<?php echo $linha19['n_usuario'] ?> <?php if ($linha19['status'] != 1) {
																							echo "Offiline";
																						} else {
																							echo "Online";
																						} ?>
												</p>
											</div>
										</div>

								<?php }
								?>

							</li>
						</ui>
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