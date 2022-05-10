<?php 

function ver_mes ($data){

    $mes = substr($data, 3, 2);

 switch ($mes) {
    case "01":
        $mes_e = "Janeiro";
        break;

    case "02":
        $mes_e = "Fevereiro";
        break;

    case "03":
        $mes_e = "Março";
        break;

    case "04":
        $mes_e = "Abril";
        break;

    case "05":
        $mes_e = "Maio";
        break;

    case "06":
        $mes_e = "Junho";
        break;

    case "07":
        $mes_e = "Julho";
        break;

    case "08":
        $mes_e = "Agosto";
        break;

    case "09":
        $mes_e = "Setembro";
        break;

    case "10":
        $mes_e = "Outubro";
        break;

    case "11":
        $mes_e = "Novembro";
        break;

    case "12":
        $mes_e = "Dezembro";
        break;
}
return $mes_e;
}
?>