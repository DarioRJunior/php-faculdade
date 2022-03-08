<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 - Formulário </title>
</head>

<body>
    
    <?php
    if (@$_REQUEST['botao'] == "calcular") {
        $num1 = $_POST['v1'];
        $num2 = $_POST['v2'];
        $tipo = $_POST['tipo'];
        @$mostrar = $_POST['mostrar'];

        if ($tipo == "S") $resultado = $num1 + $num2;
        if ($tipo == "D") $resultado = $num1 - $num2;
        if ($mostrar == "S") echo"O resultado é: " . $resultado;
        else echo $resultado;
    }
    ?>

    <form action="#" method="POST">
        Valor 1: <input type="text" name=v1 value=<?php echo @$num1;?>> <br>
        Valor 2: <input type="text" name=v2 value=<?php echo @$num2;?>> <br>
        <input type="radio" name="tipo" value="S" checked> Somar
        <input type="radio" name="tipo" value="D"> Subtrair
        <br>
        <input type="checkbox" name="mostrar" value="S" checked> Mostrar texto no resultado
        
        <input type="submit" name="botao" value="calcular">
    </form>

</body>

</html>