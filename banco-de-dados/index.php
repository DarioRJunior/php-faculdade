<html>

<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Usando Banco de Dados</title>
</head>

<body>
    <?php
    include('connection.php');

    if (@$_REQUEST['botao'] == "Gravar") {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        $query = "INSERT INTO cliente (nome, idade) values ('$nome','$idade')";
        $batatinha = mysqli_query($connect, $query);
        if (!$batatinha) echo mysqli_error($connect);
    }
    if (@$_REQUEST['botao'] == "Apagar") {
        $codigo = $_POST['codigo'];

        $query = "DELETE FROM cliente WHERE id = '$codigo'";
        $batatinha = mysqli_query($connect, $query);
        if (!$batatinha) echo mysqli_error($connect);
    }
    ?>

    <form action="#" method="POST">
        Nome: <input type="text" name="nome" required value="<?php echo @$nome; ?>">
        Idade: <input type="text" name="idade" required value="<?php echo @$idade; ?>">
        <input type="submit" name="botao" value="Gravar">
    </form>
    <hr>
    <form action="#" method="POST">
        Código: <input type="text" name="codigo" required size="4" value="<?php echo @$codigo; ?>">
        <input type="submit" name="botao" value="Apagar">
    </form>
</body>

</html>