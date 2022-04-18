<?php
session_start();
include_once("../connection/connection.php");

$nome = filter_input(INPUT_POST, 'nome');
$descricao = filter_input(INPUT_POST, 'descricao');
$preco = filter_input(INPUT_POST, 'preco');
$categoria = filter_input(INPUT_POST, 'categoria');

$result_produtos = "INSERT INTO produtos (nome, descricao, preco, categoria) VALUES ('$nome', '$descricao', '$preco', '$categoria')";
$result_produtos = mysqli_query($con, $result_produtos);

if (mysqli_insert_id($con)) {
   $_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso!</p>";
    header("Location: ../pages/anuncio.php");
} else {
    header("Location: ../pages/anuncio.php");
}
