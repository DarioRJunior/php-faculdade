<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="../atividade-01/src/css/style.css">
</head>

<?php
if (@$_REQUEST['botao'] == "Cadastrar") {

    $handle = fopen("formulario.ret", 'a+');

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $exportacao = $nome . " | " . $sobrenome . " | " . $idade . " | " . $email . " | " . $telefone . " | " . $endereco . "\n";

    fwrite($handle, $exportacao);

    fclose($handle);
}
?>

<body>
    <section class="formulario-section">
        <h1 class="titulo">Cadastro de Clientes</h1>
        <div class="container">
            <div class="box">
                <div class="formulario">
                    <form class="conteudo-formulario" action="#" method="POST">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="nome" required>
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" name="sobrenome" placeholder="sobrenome" required>
                        <label for="idade">Idade: </label>
                        <input type="text" name="idade" placeholder="25" required>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" placeholder="seuemail@dominio.com" required>
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" placeholder="xxxx-xxxx" required>
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" placeholder=" rua exemplo" required>
                        <input id="botao" type="submit" name="botao" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>