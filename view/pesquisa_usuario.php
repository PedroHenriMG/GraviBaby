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

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="../view/chat/style6.css">
</head>

<body style="background-image: linear-gradient(to right, #BE408C, #4456A0); height: 100vh; width: 100vw;">

	<div class="container-fluid h-100">
		<div class="row justify-content-center container_chat" style="height: 90%;">
			<div class="col-xs-12 col-sm-12 col-lg-12 col-xl-4 chat">
				<div class="card col-10 mt-0 bg-dark m-auto contacts_card">
					<div class="card-header">
						<div class="input-group">
							<div class="row justify-content-center align-items-center mr-1"><a href="../view/home/home.php"><span style="color:aliceblue;
							" class="material-symbols-outlined">
										arrow_back
									</span></a></div>


							<form class="m-0 d-flex" method="POST" id="form_pesquisa" action="./res_pesquisa_usuario.php">
								<input style="display: none;" value="<?php echo  $_SESSION['id'] ?>" name="idUsu" id="idUsuPes">
								<input type="text" placeholder="Pesquisar" id="input_pesquisa" name="input_pesquisa" class="form-control search" style="color:black; background-color: black;">

								<div class="input-group-prepend">
									<button style="border-radius: 0 15px 15px 0; background-color: #343a40;" type="submit"><span class="input-group-text search_btn"><i style="color: aliceblue;" class="fas fa-search"></i></span></button>
								</div>
							</form>
						</div>
					</div>
					<div class="card-body bg-dark contacts_body">
						<ui class="contacts res_contacts">


							

								
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