<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <?php include ('config.php');  ?>
</head>
<body>

<?php
$id = @$_REQUEST['id'];

if (@$_REQUEST['botao'] == "Excluir") {
		$query_excluir = "
			DELETE FROM easystock WHERE id='$id'
		";
		$result_excluir = mysqli_query($con, $query_excluir);
		
		if ($result_excluir) echo "<h2> Registro excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
}

if (@$_REQUEST['id'] and !$_REQUEST['botao'])
{
	$query = "
		SELECT * FROM easystock WHERE id='{$_REQUEST['id']}'
	";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	//echo "<br> $query";	
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
}

if (@$_REQUEST['botao'] == "Gravar") 
{
    $senha = md5($_POST['senha']);
    
	if (!$_REQUEST['id'])
	{
		$insere = "INSERT into easystock (usuario, senha) VALUES ('{$_POST['usuario']}', '$senha')";
		$result_insere = mysqli_query($con, $insere);
		
		if ($result_insere) echo "<h2> Registro inserido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui inserir!!!</h2>";
		
	} else 	
	{
		$insere = "UPDATE easystock SET 
					usuario = '{$_POST['usuario']}'
					, senha = '{$_POST['senha']}'
					WHERE id = '{$_REQUEST['id']}'
				";
		$result_update = mysqli_query($con, $insere);

		if ($result_update) echo "<h2> Registro atualizado com sucesso!!!</h2>";
		else echo "<h2> Nao consegui atualizar!!!</h2>";
		
	}
}
?>
    
<form action="cadastrar.php" method="post" name="cadastrar">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de Empresa</td>
  </tr>
  <tr>
    <td width="53">Cod.</td>
    <td width="131"><?php echo @$_POST['id']; ?>&nbsp;
  </tr>
  <tr>
    <td>Usuario:</td>
    <td><input type="text" name="usuario" required value="<?php echo @$_POST['usuario']; ?>"></td>
  </tr>
  <tr>
    <td>Senha:</td>
    <td><input type="password" name="senha" required value="<?php echo @$_POST['senha']; ?>"></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"> - <input type="submit" value="Excluir" name="botao">
    -
    <input type="reset" value="Novo" name="novo"> 	<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'] ?>" />
</td>
    </tr>	
</table>
</form>
</body>
</html>