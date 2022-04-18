<?php
include_once("../connection/connection.php");

if (isset($_POST['update'])) {
    $insere = "UPDATE produtos SET 
					nome = '{$_POST['nome']}'
					, descricao = '{$_POST['descricao']}'
					, preco = '{$_POST['preco']}'
					, categoria = '{$_POST['categoria']}'
					WHERE id = '{$_REQUEST['id']}'
				";
		$result_update = mysqli_query($con, $insere);
}
    header('Location: ../pages/produtos.php');





?>