<html>
<body>
<form action=# method=POST>
<?php 
include ("config.php");

if(@$_REQUEST ['botao']== "Gravar"){
@$nome=$_POST['nome'];
@$dt_nasc=$_POST['dt_nasc'];
@$lista=$_POST['lista'];
@$op= $_POST['op'];

$query="insert into animal (nome,dt_nasc,sexo,tipo) values('$nome','$dt_nasc','$op','$lista')";
$result=mysql_query($query);
if(!$result)echo mysql_error();
else echo "<script> alert ('inserido com sucesso.')</script>";
	
}
?>
CADASTRO DE ANIMAIS <br>
ID:<br>
Nome: <input type=text name=nome value=<?php  echo @$nome;?>> <br>
Dt_nasc:<input type=date name=dt_nasc value=<?php echo @$dt_nasc;?>><br>
Sexo: <input type=radio name=op value=m> M <input type=radio name=op value=f>F <br>
Tipo:<select name=lista>
<option value=cao> cão </option>
<option value=gato>gato</option>
<option value=boi>boi</option>
</select><br>
<input type=submit name=botao value=Gravar>
</form>
</body>
</html>



