<?php

$servidor = "localhost";
$banco = "Banco";
$userbanco ="root";
$Senha = 20032005;


try {
    $dbh = new PDO("mysql:host=$servidor;dbname=$banco",$userbanco,$Senha);
    
} catch (Exception $ex) {
    printf("Erro de Conexão:", $ex->getMessage());
}

?>