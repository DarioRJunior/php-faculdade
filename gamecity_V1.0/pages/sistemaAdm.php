<?php
session_start();

$logado = $_SESSION['usuario'];
?>

 <?php
    echo "<h1>Bem vindo adm, $logado</h1>";
    ?>