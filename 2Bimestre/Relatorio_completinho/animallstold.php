<html>
<head>
<title>Relat&oacute;rio de Clientes</title>
<?php 
	include ('config.php'); 

	function invdata($data) 
	{
		$parte = explode("-", $data);
		return ($parte[2] . "-" . $parte[1] . "-" . $parte[0]);
	} 
?>
</head>

<body>
<?php 

 if (@!$_REQUEST['botao'] == "Gerar") { ?>

<form action="animallstold.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=4 align="center">Relat&oacute;rio de Animais</td>
  </tr>
  <tr>
    <td width="10%" align="right">Nome:</td>
    <td width="40%"><input type="text" name="nome"  /></td>
	
	<td width="40%" >Ordem:
	<select name=ordem>
	<option value="id"> codigo </option>
	<option value="nome"> nome </option>
	<option value="sexo"> sexo </option>
	</select>
</td>

<td rowspan=2> <input type="submit" name="botao" value="Gerar" /> </td>
  </tr>
  <tr>
    <td width="10%" align="right">Sexo:</td>
    <td width="18%">
	
	<input type=radio name=sexo value="" checked> Ambos
	<input type=radio name=sexo value="m"> Masculino
	<input type=radio name=sexo value="f"> Feminino
	
	</td>
    <td>
	
	
	
	<input type=checkbox name=mostrar_dt_nasc value=S checked> Mostrar Data de Nascimento <br>
	<input type=checkbox name=mostrar_sexo value=S checked> Mostrar Sexo
	
	</td>
	
    
  </tr>
</table>
</form>

<?php 

 } // se eu não clicar no botao gravar
 if (@$_REQUEST['botao'] == "Gerar") { 
 
 @$mostra_data = $_POST['mostrar_dt_nasc'];
 @$mostra_sexo = $_POST['mostrar_sexo'];
 
 ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <td colspan=5 align="center"><a href=animallstold.php> Relat&oacute;rio de Animais</a></td>
  </tr>
  
  <tr bgcolor="#9999FF">
    <th width="5%">C&oacute;d</th>
    <th width="30%">Nome</th>
    <?php if ($mostra_data == "S") { ?><th width="15%">Data de Nasc</th> <?php } ?>
    <?php if ($mostra_sexo == "S") { ?><th width="12%">Sexo</th><?php } ?>
    <th width="12%">Tipo</th>
  </tr>

<?php

	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$ordem = $_POST['ordem'];
	
	$query = "SELECT *
			  FROM animal 
			  WHERE id > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($sexo ? " AND sexo = '$sexo' " : "");
	$query .= " ORDER by $ordem";
	$result = mysqli_query($con, $query);


	echo "<pre>";
	echo $query;
	echo mysqli_error($con);
	echo "</pre>";

	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    
    <tr>
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
<?php if (@$mostra_data == "S") { ?><th width="15%"><?php echo invdata($coluna['dt_nasc']); ?></th> <?php } ?>
    <?php if (@$mostra_sexo == "S") { ?><th width="12%"><?php echo $coluna['sexo']; ?></th><?php } ?>
        

	  <th width="12%"><?php echo $coluna['tipo']; ?></th>

    </tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>
</body>