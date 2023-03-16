<?php

$servidor = "localhost";
$banco = "prot_gravi";
$userbanco ="root";
$Senha = "root";


try {
    $dbh = new PDO("mysql:host=$servidor;dbname=$banco",$userbanco,$Senha);
    
} catch (Exception $ex) {
    printf("Erro de Conexão:", $ex->getMessage());
}

?>