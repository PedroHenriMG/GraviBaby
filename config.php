<?php

$servidor = "localhost";
$banco = "limaseducar_gravibaby";
$userbanco ="root";
$Senha = 20032005;

try {
    $dbh = new PDO("mysql:host=$servidor;dbname=$banco",$userbanco,$Senha);
    
} catch (Exception $ex) {
    printf("Erro de Conexão:", $ex->getMessage());
}

?>