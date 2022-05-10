<?php 
    $handle = fopen("catraca.txt", 'a+');

    $nome = "Dario";
    $idade = "25";
    $sexo = "M";

    $exportacao = $nome."|".$idade."|".$sexo."\n";

    fwrite($handle, $exportacao);

    fclose($handle);
?>