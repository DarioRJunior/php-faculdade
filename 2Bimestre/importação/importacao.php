<?php
include('conexao.php'); // conectar no banco de dados

if (@$_REQUEST['botao']) {
    $filename = $_POST['arquivo']; // nome do arquivo (está na mesma pasta)
    $handle = fopen($filename, 'r'); // abrir o arquivo com permissão de leitura
    while (!feof($handle)) // laço de repetição para ler todo o arquivo find-end-of-file
    {
        $conteudolinha = fgets($handle); // pega o conteudo de uma linha e joga em uma variavel
        $cod_aluno = substr($conteudolinha, 0, 6);
        $data = substr($conteudolinha, 8, 8);
        $hora = substr($conteudolinha, 16, 4);
        $valor = substr($conteudolinha, 24, 7);

        $inserir = "INSERT INTO faculdade (cod, data, hora, valor) VALUES ('$cod_aluno','$data', '$hora', '$valor');";
        if($cod_aluno <> '001') $result = mysqli_query($con, $inserir);
        echo $inserir . "<br>";
    }
    fclose($handle); // fecha o arquivo
}

?>
<form action="importacao.php" method="POST">
    Escolha o arquivo: <input type="file" name="arquivo">
    <input type="submit" name="botao">
</form>