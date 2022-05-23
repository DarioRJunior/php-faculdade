<?php
include('conexao.php'); // conectar no banco de dados

if (@$_REQUEST['botao']) {
    $filename = $_POST['arquivo']; // nome do arquivo (está na mesma pasta)
    $handle = fopen($filename, 'r'); // abrir o arquivo com permissão de leitura
    while (!feof($handle)) // laço de repetição para ler todo o arquivo find-end-of-file
    {
        $conteudolinha = fgets($handle); // pega o conteudo de uma linha e joga em uma variavel
        $id = substr($conteudolinha, 0, 0);
        $nome = substr($conteudolinha, 0, 10);
        $sobrenome = substr($conteudolinha, 10, 10);
        $idade = substr($conteudolinha, 20, 5);
        $email = substr($conteudolinha, 25, 20);
        $telefone = substr($conteudolinha, 45, 12);
        $endereco = substr($conteudolinha, 57, 50);

        $inserir = "INSERT INTO clientes (nome, sobrenome, idade, email, telefone, endereco) VALUES ('$nome','$sobrenome', '$idade', '$email', '$telefone', '$endereco);";
        if($id <> '1') $result = mysqli_query($con, $inserir);
        echo $nome, $sobrenome, $idade, $email, $telefone, $endereco . "<br>";
    }
    fclose($handle); // fecha o arquivo
}

?>
<form action="importacao.php" method="POST">
    Escolha o arquivo: <input type="file" name="arquivo">
    <input type="submit" name="botao">
</form>