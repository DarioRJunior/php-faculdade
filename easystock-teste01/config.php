<?php
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con, 'easystock');
	
if(!$con || !$db)
{
	echo "<pre>";
	echo mysqli_error($con);
	echo "</pre>";
}
?>