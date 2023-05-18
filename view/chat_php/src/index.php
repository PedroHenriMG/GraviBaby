<html>

<!-- Head -->
<head> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chat - PHP</title>
	<link rel="icon" href="../img/icon.png">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
	
</head> 
<!-- Final do Head -->
	<!-- Inicio do body -->
	<body>

		<!-- Inicio do container -->
		<div class="container">

				<!-- Incio da row -->
				<div class="row">

					<!-- Inicio do col-md-5 -->
					<div class="col-md-5">

							<div class="divWelcome">
							<h1 class="TextosAparte"> <span id="TituloPrincipal">PHP</span> CHAT</h1>
							<hr style="border-color: #1c1c1c ; opacity: 25%;">
							<p class="TextosAparte">
							Seja bem vindo ao projeto PHP CHAT, este projeto consiste na criação de um site utiliando
							o php como linguaguem do back-end, no qual será responsável por armazenar as mensagens enviadas
							para os demais usuários. Este é um sistema simples, visando ajudar aqueles que precisam de um 
							sistema de chat utilizando a linguagem em PHP. Este é um sistema simplificado e que pode ser
							melhorado, sinta-se livre para se utilizar dos códigos disponibilizados no GitHub do desenvolvedor deste sistema. Obrigado pela atenção!</p>


							<span class="TextosAparte">- Pedro Pessoa</span>
							<a href="https://github.com/yzPeedro"><img src="../img/gitlogo.png" class="logos"></a>

					</div>
				</div>
				<!-- Final do col-md-5 -->

				<!-- Inicio do col-md-7 -->
					<div class="col-md-7">

						<!-- Divisão que renderiza o chat -->
							<div class="chat" id="chat">
									
							</div>

						<!-- Formulário de envios das mensagens -->
						<div class="formulariomsg" action="index.php" method="POST">
								<textarea name="mensagem" id='msg' class="mensagem" placeholder="Digite sua mensagem aqui."></textarea><br>
								
								<input type="button" class="botaoEnviar" Value="Enviar" id="btnEnviar">
						</div>
					</div>
				<!-- Final do col-md-7 -->

			</div>
			<!-- Final da row -->

		</div>
		<!-- Final do container -->
		
	</body>
	<!-- Final do body -->

	<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!-- /jQuery -->

	<script type="text/javascript" src="../js/script.js"></script>
	
</html>