<?php
session_start();
// print_r($_REQUEST);
if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    // Acessa
    include_once('../connection/connection.php');
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) < 1) {
        header('Location: login.php');
    } else {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION["UsuarioNivel"] = $coluna["nivel"];

        $niv = $coluna['nivel'];
		if($niv == ""){ 
			header("Location: ../pages/sistema.php");
			exit; 
		}
		
		if($niv == "ADM"){ 
			header("Location: ../pages/sistema.php"); 
			exit; 
		}
    }
} else {
    header('Location: ../index.php');
}
