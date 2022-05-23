<html>
<head>
<title>Relat&oacute;rio de Clientes</title>
<?php 
	include ('config.php'); 

?>
</head>

<body>
<?php 

 if (@!$_REQUEST['botao'] == "Gerar") { ?>

<form action="animallst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=4 align="center">Relat&oacute;rio de Animais</td>
  </tr>
  <tr>
    <td width="10%" align="right">Nome:</td>
    <td width="40%"><input type="text" name="nome"  /></td>
	
	<td width="40%">
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
		
	</td>
	
    
  </tr>
</table>
</form>

<?php 

 } // se eu não clicar no botao gravar
 if (@$_REQUEST['botao'] == "Gerar") { 
  
 ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <td colspan=5 align="center"><a href=animallst.php> Relat&oacute;rio de Animais</a></td>
  </tr>
  
  <tr bgcolor="#9999FF">
    <th width="5%">C&oacute;d</th>
    <th width="30%">Nome</th>
    <th width="15%">Data de Nasc</th> 
    <th width="12%">Sexo</th>
    <th width="12%">Tipo</th>
  </tr>

<?php

	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	
	$query = "SELECT *
			  FROM animal 
			  WHERE id > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($sexo ? " AND sexo = '$sexo' " : "");
	$result = mysql_query($query);

/*
	echo "<pre>";
	echo $query;
	echo mysql_error();
	echo "</pre>";
*/
	while ($coluna=mysql_fetch_array($result)) 
	{
		
	?>
    
    <tr>
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
<th width="15%"><?php echo $coluna['dt_nasc']; ?></th> 
    <th width="12%"><?php echo $coluna['sexo']; ?></th>
        

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