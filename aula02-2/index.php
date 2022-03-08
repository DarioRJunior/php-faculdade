<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando while</title>
</head>

<body>
    <table border='1'>
        <?php
        if (@$_REQUEST['botao'] == "mostrar") {
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];

            while ($n1 <= $n2) {

                echo "<tr><td>" . $n1 . "</td>";
                $n1++;
            }
        }
        ?>
    </table>

    <form action="#" method="POST">
        Valor 1: <input type="text" name="n1" maxlength="2" size=3 required value="<?php echo @$n1; ?>">
        Valor 2: <input type="text" name="n2" maxlength="2" size=3 required value="<?php echo @$n2; ?>">
        <input type="submit" name="botao" value="mostrar">
    </form>


</body>

</html>