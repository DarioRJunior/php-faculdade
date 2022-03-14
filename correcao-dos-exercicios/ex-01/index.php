<html>

<body>

    <?php
    if (@$_REQUEST['botao'] == "verificar") {
        $var = $_POST['numero'];

        if($var > 0) echo ' Positivo';
        else if ($var < 0) echo ' Negativo';
        else echo 'É zero';
    }
    ?>


    <form action="#" method="POST">
        Numero: <input type="text" name="numero" required value="<?php echo @$var ?>">
        <input type="submit" name="botao" value="verificar">
    </form>
</body>

</html>