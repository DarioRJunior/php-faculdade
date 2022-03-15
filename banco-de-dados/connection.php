<?php

$connect = mysqli_connect("localhost", "root", "");
$database = mysqli_select_db($connect, "aula1");

if (!$connect || $database) echo mysqli_error($connect);
?>