<?php
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con, 'atividadeImportacao');
	
if(!$con || !$db)
{
	echo "<pre>";
	echo mysqli_error($con);
	echo "</pre>";
}
?>