<html>

<body>

    <?php
    if (@$_REQUEST['botao'] == "verificar") {
        $media = $_POST['media'];

        if ($media >= 6) echo 'Passou';
        else if($media >= 3 && $media <6) echo 'Precisa fazer o exame final';
        else echo 'Reprovado';
    }
    ?>


    <form action="#" method="POST">
        Media: <input type="text" name="media" required value="<?php echo @$media ?>">
        <input type="submit" name="botao" value="verificar">
    </form>
</body>

</html>