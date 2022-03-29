<?php
include ('config.php');

if (@$_REQUEST['botao']=="Entrar")
{
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	
	$query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
    header("Location: menu.php");
}


?>

<html>
<body>
<form action=# method=post>

Usuario: <input type=text name=usuario>
Senha: <input type=text name=senha>
<input type=submit name=botao value=Entrar>

</form>










