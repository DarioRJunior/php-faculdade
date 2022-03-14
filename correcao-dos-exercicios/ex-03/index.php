<html>

<body>

    <?php
    if (@$_REQUEST['botao'] == "verificar") {
        $altura = $_POST['altura'];
        $sexo = $_POST['sexo'];

        if ($sexo == "M") echo ((72.7*$altura)+58);
        else if ($sexo == "F") echo ((62.1*$altura)-44.7);
        else echo "Escolha o sexo";

        
    }
    ?>


    <form action="#" method="POST">
        Altura: <input type="text" name="altura" required value="<?php echo @$altura ?>">
        <br>
        <input type="radio" name="sexo" required value="M"> Masculino
        <input type="radio" name="sexo" required value="F"> Feminino
        <input type="submit" name="botao" value="verificar">
    </form>
</body>

</html>