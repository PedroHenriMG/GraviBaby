<?php
/*
########################
	Função php que se conecta ao
	banco de dados
########################
*/
	try {
		$dns = "mysql:dbname=limaseducar_gravibaby;host=localhost"; 
		$user = "root";
		$pass = "root";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}
	/*
		Importante: Lembre-se sempre de adaptar a conexão quando
		houve uma alteração no banco (adicionar tabelas, remover tabelas,
		alterar nome do banco e etc)
	*/
?>