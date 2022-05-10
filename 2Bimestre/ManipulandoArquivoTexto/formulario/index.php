<!-- Criar um formulário com 5 colunas e salvar
os dados em um txt. Esse TXT será seu banco de dados -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>

<?php
if (@$_REQUEST['botao'] == "Salvar") {

    $handle = fopen("formulario.txt", 'a+');

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $exportacao = $nome . "|" . $sobrenome . "|" . $idade . "|" . $email . "|" . $telefone . "\n";

    fwrite($handle, $exportacao);

    fclose($handle);
}
?>

<body>
    <section class="formulario">
        <form action="#" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="nome" required><br>
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" placeholder="sobrenome" required><br>
            <label for="idade">Idade: </label>
            <input type="text" name="idade" placeholder="25" required><br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="seuemail@dominio.com" required><br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" placeholder="xxxx-xxxx" required><br>
            <input type="submit" name="botao" value="Salvar">
        </form>
    </section>
</body>

</html>