<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Doação</title>
</head>

<body>

    <?php
    include('funcoes.php');

    if (@$_REQUEST['botao'] == "Enviar") {

        $senha = $_POST['senha'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];
        $valor = str_replace(",", ".", $valor); // para trocar a , por .
        $tamanho = strlen($senha);

        if ($tamanho >= 6 && $tamanho <= 10) {
            echo "Senha gravada! <br>";
        } else {
            echo "<script>alert('Digite uma senha entre 6 e 10 caracteres!!');</script>";
        }
        
        $mes_e = ver_mes($data);
        echo "Obrigado pela sua doação de R$ " . $valor . ", lembraremos em você em " . $mes_e;
    }
    ?>
    <form action="#" method="POST">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <label for="data">Data de nascimento:</label>
        <input type="text" name="data" required placeholder="xx-xx-xxxx">
        <label for="valor">Valor: </label>
        <input type="text" name="valor" required>
        <input type="submit" name="botao" value="Enviar">
    </form>

</body>

</html>