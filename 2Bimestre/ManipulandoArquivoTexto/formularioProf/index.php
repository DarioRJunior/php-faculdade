<!-- 
$nome = "Lucas";
$nome = fcomplemento($nome, 10, " ");

cod 0 - 5
nome 6 - 25
idade 26 - 28
sexo 29 - 30 -->.

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

include('funcoes.php');


if (@$_REQUEST['botao'] == "Salvar") {

    $handle = fopen("formularioProf.txt", 'a+');

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];

    $codigo = fcomplemento($codigo, 6, " ");
    $nome = fcomplemento($nome, 19, " ");
    $idade = fcomplemento($idade, 2, " ");
    $sexo = fcomplemento($sexo, 1, " ");

    $exportacao = $codigo . "|" . $nome . "|" . $idade . "|" . $sexo . "\n";

    fwrite($handle, $exportacao);

    fclose($handle);
}
?>

<body>
    <section class="formulario">
        <form action="#" method="POST">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" required><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="nome" required><br>
            <label for="idade">Idade: </label>
            <input type="text" name="idade" placeholder="25" required><br>
            <label for="sexo">sexo:</label>
            <input type="text" name="sexo" placeholder="M" required><br>
            <input type="submit" name="botao" value="Salvar">
        </form>
    </section>
</body>

</html>