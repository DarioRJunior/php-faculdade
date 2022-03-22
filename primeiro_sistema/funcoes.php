<?

// ------------------------------------------------------------------------------
// ----------- Função para consistência na exclusão de registros       ----------
// ------------------------------------------------------------------------------
//
// function verifexclui($v_tabela, $v_codigo, $v_param)
//  $v_tabela = nome da tabela a ser consistida
//  $v_codigo = codigo do registro a ser consistido
//  $v_param = código do parâmetro para exclusão da tabela
//  Ex: verifexclui("aluno", "322", "1") => verifica o aluno de código = 322 com parâmetro = "1"
//
//  a função retorna "" se o registro puder ser excluído ou então retorna uma string com a mensagem de erro

function verifexclui($v_tabela, $v_codigo, $v_param)
{
	$retorno = "";
	if ($v_tabela == "aluno")
	{
		$v_qtde = "";
		mysql_select_db($nomeDb);
		$query = "SELECT  count(*), 
				  FROM mataluno 
				  WHERE cod_aluno = '$v_codigo'
				  AND   CONCAT(lancada1b,lancada2b,lancada3b,lancada4b,lancadar1,lancadar2,
							   lancadasub1b,lancadasub2b,lancadasub3b,lancadasub4b,lancadasubr1,lancadasubr2) > ''";
		$result = mysql_query($query);
		while ($coluna=mysql_fetch_row($result)) {
			$v_qtde = $coluna[0];
		}
		if ($v_qtde)
		{
			$retorno = "Aluno possui matérias com notas lançadas, exclusão não permitida";
			return $retorno;
		}

	}

	if ($v_tabela == "turma")
	{
		mysql_select_db($nomeDb);
		$query = "SELECT count(*) 
				  FROM matturma 
				  WHERE cod_turma = '$v_codigo'";
		$result = mysql_query($query);
		while ($coluna=mysql_fetch_row($result)) {
			$v_qtde = $coluna[0];
		}
		if ($v_qtde)
		{
			$retorno = "Turma possui matérias relacionadas, exclusão não permitida";
			return $retorno;
		}

		$v_qtde = "";
		mysql_select_db($nomeDb);
		$query = "SELECT count(*), 
				  FROM mataluno 
				  WHERE cod_turma = '$v_codigo'
				  AND CONCAT(lancada1b,lancada2b,lancada3b,lancada4b,lancadar1,lancadar2,
							 lancadasub1b,lancadasub2b,lancadasub3b,lancadasub4b,lancadasubr1,lancadasubr2) > ''";
		$result = mysql_query($query);
		while ($coluna=mysql_fetch_row($result)) {
			$v_qtde = $coluna[0];
		}
		if ($v_qtde)
		{
			$retorno = "Turma possui matérias com notas lançadas, exclusão não permitida";
			return $retorno;
		}
	}

	if ($v_tabela == "fornecedor")
	{
		if ($v_codigo == '1')
		{
			$retorno = "Fornecedor código '1' não pode ser excluído !!";
			return $retorno;
		}
		mysql_select_db($nomeDb); 
		$query = "SELECT count(*) 
				  FROM pagar 
				  WHERE cod_fornecedor = '$v_codigo'";
		$result = mysql_query($query);
		while ($coluna=mysql_fetch_row($result)) {
			$v_qtde = $coluna[0];
		}
		if ($v_qtde)
		{
			$retorno = "Fornecedor possui contas a pagar relacionadas, exclusão não permitida";
			return $retorno;
		}
	}


}
//---------------INICIO DO VERIFICA CPF E CNPJ----------------------
if (${"chkCPF"}=="on")  
   { 
      CalculaCPF($CampoNumero);
   }

//}
//  else
//{
//
//  CalculaCNPJ($CampoNumero);
//} 

function CalculaCPF($CampoNumero)
{

  $RecebeCPF=$CampoNumero;
  $retorno = 1;
//Retirar todos os caracteres que nao sejam 0-9

  $s="";
  for ($x=1; $x<=strlen($RecebeCPF); $x=$x+1)
  {

    $ch=substr($RecebeCPF,$x-1,1);
    if (ord($ch)>=48 && ord($ch)<=57)
    {

      $s=$s.$ch;
    } 


  } 

  $RecebeCPF=$s;

  if (strlen($RecebeCPF)!=11)
  {
    $retorno = 0; 
    echo "<h1>&Eacute; obrigat&oacute;rio o CPF com 11 d&iacute;gitos</h1>";
}
    else
  if ($RecebeCPF=="00000000000")
  {
    $then;
	$retorno = 0; 
    echo "<h1>CPF Inválido</h1>";
  }
    else
  {


    $Numero[1]=intval(substr($RecebeCPF,1-1,1));
    $Numero[2]=intval(substr($RecebeCPF,2-1,1));
    $Numero[3]=intval(substr($RecebeCPF,3-1,1));
    $Numero[4]=intval(substr($RecebeCPF,4-1,1));
    $Numero[5]=intval(substr($RecebeCPF,5-1,1));
    $Numero[6]=intval(substr($RecebeCPF,6-1,1));
    $Numero[7]=intval(substr($RecebeCPF,7-1,1));
    $Numero[8]=intval(substr($RecebeCPF,8-1,1));
    $Numero[9]=intval(substr($RecebeCPF,9-1,1));
    $Numero[10]=intval(substr($RecebeCPF,10-1,1));
    $Numero[11]=intval(substr($RecebeCPF,11-1,1));


    $soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*$Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];

    $soma=$soma-(11*(intval($soma/11)));

    if ($soma==0 || $soma==1)
    {

      $resultado1=0;
    }
      else
    {

      $resultado1=11-$soma;
    } 


    if ($resultado1==$Numero[10])
    {


      $soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+$Numero[7]*5+$Numero[8]*4+$Numero[9]*3+$Numero[10]*2;

      $soma=$soma-(11*(intval($soma/11)));

      if ($soma==0 || $soma==1)
      {

        $resultado2=0;
      }
        else
      {

        $resultado2=11-$soma;
      } 


      if ($resultado2==$Numero[11])
      {
        //echo "<h1>CPF Válido</h1>";
      }
        else
      {
        $retorno = 0; 
        echo "<h1>CPF Inválido</h1>";
      } 

    }
      else
    {
      $retorno = 0;  
      echo "<h1>CPF Inválido</h1>";
    } 

  } 

return $retorno;
} 

//------------------------CALCULANDO CNPJ------------------------//
function CalculaCNPJ($CampoNumero)
{

  $RecebeCNPJ=${"CampoNumero"};

  $s="";
  for ($x=1; $x<=strlen($RecebeCNPJ); $x=$x+1)
  {

    $ch=substr($RecebeCNPJ,$x-1,1);
    if (ord($ch)>=48 && ord($ch)<=57)
    {

      $s=$s.$ch;
    } 


  } 

  $RecebeCNPJ=$s;

  if (strlen($RecebeCNPJ)!=14)
  {

    echo "<h1>&Eacute; obrigat&oacute;rio o CNPJ com 14 d&iacute;gitos</h1>";
}
    else
  if ($RecebeCNPJ=="00000000000000")
  {
    $then;
    echo "<h1>CNPJ Inv&aacute;lido</h1>";
  }
    else
  {


    $Numero[1]=intval(substr($RecebeCNPJ,1-1,1));
    $Numero[2]=intval(substr($RecebeCNPJ,2-1,1));
    $Numero[3]=intval(substr($RecebeCNPJ,3-1,1));
    $Numero[4]=intval(substr($RecebeCNPJ,4-1,1));
    $Numero[5]=intval(substr($RecebeCNPJ,5-1,1));
    $Numero[6]=intval(substr($RecebeCNPJ,6-1,1));
    $Numero[7]=intval(substr($RecebeCNPJ,7-1,1));
    $Numero[8]=intval(substr($RecebeCNPJ,8-1,1));
    $Numero[9]=intval(substr($RecebeCNPJ,9-1,1));
    $Numero[10]=intval(substr($RecebeCNPJ,10-1,1));
    $Numero[11]=intval(substr($RecebeCNPJ,11-1,1));
    $Numero[12]=intval(substr($RecebeCNPJ,12-1,1));
    $Numero[13]=intval(substr($RecebeCNPJ,13-1,1));
    $Numero[14]=intval(substr($RecebeCNPJ,14-1,1));

    $soma=$Numero[1]*5+$Numero[2]*4+$Numero[3]*3+$Numero[4]*2+$Numero[5]*9+$Numero[6]*8+$Numero[7]*7+$Numero[8]*6+$Numero[9]*5+$Numero[10]*4+$Numero[11]*3+$Numero[12]*2;

    $soma=$soma-(11*(intval($soma/11)));

    if ($soma==0 || $soma==1)
    {

      $resultado1=0;
    }
      else
    {

      $resultado1=11-$soma;
    } 

    if ($resultado1==$Numero[13])
    {

      $soma=$Numero[1]*6+$Numero[2]*5+$Numero[3]*4+$Numero[4]*3+$Numero[5]*2+$Numero[6]*9+$Numero[7]*8+$Numero[8]*7+$Numero[9]*6+$Numero[10]*5+$Numero[11]*4+$Numero[12]*3+$Numero[13]*2;
      $soma=$soma-(11*(intval($soma/11)));
      if ($soma==0 || $soma==1)
      {

        $resultado2=0;
      }
        else
      {

        $resultado2=11-$soma;
      } 

      if ($resultado2==$Numero[14])
      {

        echo "<h1>CNPJ válido</h1>";
      }
        else
      {

        echo "<h1>CNPJ inválido</h1>";
      } 

    }
      else
    {

      echo "<h1>CNPJ inválido</h1>";
    } 

  } 

} 
//------------------FIM DO VERIFICA CPF E CNPJ-------------------------------------

// Verifica se os campos infomados como obrigatorios estão preenchidos
function camposObrigatorios($variaveis) {
        echo "<script language=\"JavaScript\">\n";
        echo "function $variaveis[0]Fcn() {\n";
        for ($contador=1;$contador<count($variaveis);$contador=$contador+2) {
                echo "  if (document.$variaveis[0].$variaveis[$contador].value==\"\") {\n";
                $contadorMaisUm=$contador+1;
                echo "          alert('Favor preencher o campo: $variaveis[$contadorMaisUm]');\n";
                echo "          document.$variaveis[0].$variaveis[$contador].focus();\n";
                echo "          return false;\n";
                echo "          }\n";
                } // next do for
/*        echo "  if (confirm('Deseja realmente confirmar essa operação?')) {\n";
        echo "          return true;\n";
        echo "          } else {\n";
        echo "          return false;\n";
        echo "          }\n"; */
        echo "  }\n";
        echo "</script>\n"; 
 }

/* Exemplo:

echo "<form name=\"pesquisaPecas\" method=\"post\" action=\"$PHP_SELF\" onSubmit=\"return pesquisaPecasFcn()\">\n";
<p>Código da peça:<input type=\"text\" size=\"15\" maxlength=\"14\" name=\"codigoPeca\"></p>\n";
<p>Data inical DDMMAAAA:<input type=\"text\" size=\"8\" maxlength=\"8\" name=\"dataMovimentacao\"></p>";
echo "</form>\n";
$varCampos=array("pesquisaPecas","codigoPeca","Código da Peça","dataMovimentacao","Data Inicial");
camposObrigatorios($varCampos);

*/

// Retorna a data invertida. O padrão do Mysql é aaaa-mm-dd. Aqui retorna dd/mm/aaaa
function invdata($data) 
{
	$parte = explode("-", $data);
	return ($parte[2] . "-" . $parte[1] . "-" . $parte[0]);
}

// Retorna a data por extenso
function fDataExtenso($dia,$mes,$ano)
{
	$mes_ext = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho",
					 "Agosto","Setembro","Outubro","Novembro","Dezembro");
	$DataExt = $dia . " de " . $mes_ext[($mes-1)] . " de " . $ano;
	return $DataExt;
}
 
// Retorna a data e hora invertidos. O padrão do Mysql é aaaa-mm-dd hh:mm:ss. Aqui retorna dd-mm-aaaa hh:mm:ss
function invdthora($data) 
{
	$parte = explode(" ", $data);
	$parte1 = explode("-", $parte[0]);
	return ($parte1[2] . "-" . $parte1[1] . "-" . $parte1[0] . " " . $parte[1]);
}

// Retorna se o usuário tem direito a realizar uma tarefa
function fverificadireitos($cod_user, $cod_tar) 
{
$direito = 0;
			
	mysql_select_db($nomeDb);
	$query = "SELECT cod_tar, cod_user
			  FROM usertar
			  WHERE cod_tar = '$cod_tar'
			  AND cod_user = '$cod_user' " ;
	$matriz_mestre = mysql_query($query);
	while ($coluna_mestre=mysql_fetch_row($matriz_mestre)) 
	{
	   $direito++ ;
	}	
//echo "cod_user = $cod_user  -  cod_tar = $cod_tar";	
	return ($direito);
}

// Completa o numero informado com zeros até chegar ao tamanho escolhido
function fzerosnafrente($numero,$tamanho)
{
   $TamanhoNumero = strlen($numero); 
   
   if ($TamanhoNumero < $tamanho) 
   {
      while ($TamanhoNumero < $tamanho) 
      { 
        $numero = "0".$numero;
		$TamanhoNumero = strlen($numero); 
      }
   }
   
   return $numero;
}

// Verifica se o 1º numero encontrado é zero, e o elimina
function ftirazerosnafrente($numero)
{
   $caracter = substr($numero,0,1);
   $ifim = strlen($numero); 

   if ($caracter == 0)
   {
	  while ($caracter == 0) 
      { 
		$numero = substr($numero,$ipos,$ifim);
		$ipos = 0;
  	    $ifim = ($ifim - 1); 
		$caracter = substr($numero,0,1);
		$ipos++;
	  }
   }
   return $numero;
}

// Verifica se o aluno está inadimplente
function finadimplente($matricula, $dias)
{
	// $dias == 999 -> verificando se o aluno possui titulos devolvidos
	// $dias == 888 -> verificando se o aluno possui titulos na SicCobranças
	// $dias < 100 -> verificando se o aluno esta inadimplente
		
	$dt_hoje = date("Y-m-d"); 
//	$dt_hoje = '2007-11-06';
	$inadimplente = "N";
	$contador = 0;

	
	if ($dias == 999) 
	{
		$condic = "dt_pagto <> '0000-00-00'
		 		   AND compensou = 'N'
				   AND cod_aluno = '$matricula' ";
	}

	if ($dias == 888)
	{
		$condic = "dt_pagto = '0000-00-00'
			  	   AND cod_aluno = '$matricula' 
			       AND parcela_sic = 'S' ";
	}

	if ($dias < 100)
	{
		$condic = "dt_pagto = '0000-00-00'
				   AND dt_vencto < '$dt_hoje'
				   AND cod_aluno = '$matricula' 
				   AND (situacao = 'P' or situacao = 'B')";
	}
	
	$query = "SELECT cod_receber, dt_vencto, compensou, parcela_sic
	          FROM receber
			  WHERE $condic ";
/*
if ($matricula == 3374) echo "<br> $dias query $query";
if ($matricula == 6411) echo "<br> $dias query $query";
if ($matricula == 6414) echo "<br> $dias query $query";
if ($matricula == 6346) echo "<br> $dias query $query";
*/
	$result = mysql_query($query);
	while ($coluna=mysql_fetch_row($result))
	{
		$receber_cod_receber = $coluna[0];
		$receber_dt_vencto = $coluna[1];
		$receber_compensou = $coluna[2];
		$receber_parcela_sic = $coluna[3];
		
		$data = $receber_dt_vencto;
		
//		echo "<br> matricula: $matricula - codigo: $receber_cod_receber - vencimento: $receber_dt_vencto - compensou: $receber_compensou - sic: $receber_parcela_sic";

		if ($dias < 100)
		{
			//echo "<br> $contador < $dias ";
			while ($contador < $dias)
			{ 
				$data = incrementadata($data);
				$contador++;
				//if ($matricula == 5810) echo "<br>data limite $data";
			}
	
			$data_imp = invdata($data);
			$dt_hoje_imp = invdata($dt_hoje);
			
			$data = ftiracaracteres($data);
			$dt_hoje = ftiracaracteres($dt_hoje);
			
			if ($data <= $dt_hoje) $inadimplente = "S";
			
//			if ($matricula == 5088) echo "<br>data limite $data < $dt_hoje";
		}
		else 
		{
			$inadimplente = "S";
//			echo "<br><br>$matricula<br><br>";			
		}	
	}
//	echo "<br>bunda$inadimplente";
	return $inadimplente;
}

// Completa a palavra com um valor informado até chegar ao seu tamanho
function fcomplemento ($palavra,$tamanho,$val)
{
//--- $palavra = JOSE
//--- $tamanho = 15
//--- $val = B
//--- retornara $palavra = JOSEBBBBBBBBBBB
   $TamanhoNumero = strlen($palavra); 
   
   if ($TamanhoNumero < $tamanho) 
   {
      while ($TamanhoNumero < $tamanho) 
      { 
        $palavra = $palavra.$val;
		$TamanhoNumero = strlen($palavra); 
      }
   }
   return $palavra;
}

function ftiracaracteres ($palavra)
{
   $palavra = str_replace ("-", "", $palavra);
   $palavra = str_replace ("/", "", $palavra);
   $palavra = str_replace (".", "", $palavra);
   $palavra = str_replace (",", "", $palavra);
   $palavra = str_replace ("(", "", $palavra);
   $palavra = str_replace (")", "", $palavra);
   
//   $palavra = str_replace (":", "", $palavra);
   return $palavra;
}


// Função para incluir registro no histórico do aluno (histaluno)
// gravahist($aluno, $motivo, $historico)
function gravahist($aluno, $motivo, $historico, $usuario)
{
	mysql_select_db($nomeDb);
	$query  =  "INSERT INTO histaluno (cod_aluno, cod_motivo, cod_user, data, horaminuto, historico) VALUES
				('$aluno', '$motivo', '$usuario', '".date("Y-m-d",time())."', '".date("H:i",time()).
				"', '".trim($historico)."')";
	$result = mysql_query($query);

}

// Função para incluir registro no log (logtar)
function gravalog($cod_user, $cod_tar, $desc1, $desc2, $desc3, $desc4, $desc5, $desc6)
{
	mysql_select_db($nomeDb);
	$query  =  "INSERT INTO logtar (cod_user, cod_tar, data, hora_min_seg, desc1, desc2, desc3, 
									desc4, desc5, desc6) 
				VALUES ('$cod_user', '$cod_tar', '".date("Y-m-d",time())."', '".date("H:i:s",time())."', 
				 '$desc1', '$desc2', '$desc3', '$desc4', '$desc5', '$desc6')";
	$result = mysql_query($query);	
}

// Função para incrementar a data
// Recebe e passa a data invertida
// 2005-12-01
function incrementadata($data)
{
	$dia = substr($data,8,2);
	$mes = substr($data,5,2);
	$ano = substr($data,0,4);

	$dia = $dia + 1;
	$entrou = 0;
	
	if ($dia >= '29' and $mes == '02')
	{
	 	if ($dia == '30')
		{
			$dia = 1;
			$mes = '03';
			$entrou = 1;		
		}
		
		if ($entrou == 0)
		{
			if (($ano >= 2005 and $ano < 2008) or ($ano >= 2009 and $ano < 2012) or ($ano >= 2013 and $ano < 2016) or ($ano >= 2017 and $ano < 2020)) 
			 {
				  $dia = 1;
				  $mes = '03';
				  $entrou = 1;
			 }
		}
	}
	if ($entrou == 0)
	{  	 
		 if ($dia == '31' and $mes <> '12')
		 {
		     if (($mes == '04') or ($mes == '06') or ($mes == '09') or ($mes == '11'))
			 {
		          $dia = 1;
			      $mes = $mes + 1;
				  if ($mes < '10') $mes = "0". $mes;
			 }
	     }

		 if ($dia == '31' and $mes == '12')
		 {
		          $dia = 1;
			      $mes = '01';
				  $ano = $ano + 1;
		 }		 		 
		 
		 if ($dia == '32' and $mes <> '12') 
		 {    
	          $dia = 1;
		      $mes = $mes + 1;
			  if ($mes < '10') $mes = "0". $mes;
		 }			
		 
		 if ($dia == '32' and $mes == '12') 
		 {    
	          $dia = 1;
		      $mes = '01';
			  $ano = $ano + 1;
		 }			
	}
	
	if ($dia < '10') $dia = "0". $dia;
	$data = $ano . "-" . $mes . "-" . $dia ;

	return $data;
}

// Retorna o dia de uma $data
function fdia($data)
{
	$dia = substr($data,8,2);
	$mes = substr($data,5,2);
	$ano = substr($data,0,4);

	return $dia;
}

// Retorna o mes de uma $data
function fmes($data)
{
	$mes = substr($data,5,2);

	return $mes;
}

// Retorna o ano de uma $data
function fano($data)
{
	$ano = substr($data,0,4);

	return $ano;
}

// Retorna o numero incrementado no mestre
function fcriaautomatico($campo)
{
	mysql_select_db($nomeDb);
	$query = "SELECT relatorio FROM mestre WHERE cod_mestre = '1'";
	$result = mysql_query($query);
	while ($coluna=mysql_fetch_row($result))
	{
		$mestre_relatorio = $coluna[0];
	}
	
	$rel_mestre = 0;
	$rel_mestre = $mestre_relatorio + 1;
	
	$inserem = "UPDATE mestre SET $campo = '$rel_mestre' WHERE cod_mestre = 1 ";
	
	//	print "<br> rel_mestre $rel_mestre / mestre_relatorio $mestre_relatorio";
					
	$resultm = mysql_query($inserem);
	if (!resultm)
	{
		echo "Erro ao gravar no arquivo Mestre !!!";
		exit;
	}

	return $mestre_relatorio;
}

// Retorna o ano_mes incrementado
function fincrementaanomes($ano_mes)
{
	$ano = substr($ano_mes,0,4);
	$mes = substr($ano_mes,4,2);

	if ($mes < 12)
	{
		$mes++;
		$mes = fzerosnafrente($mes,2);	
	}
/*	
	if ($mes == 12)
	{
		$ano++;
		$mes = "01";
		$mes = fzerosnafrente($mes,2);	
	}
*/	
	$ano_mes2 = $ano.$mes;
//	echo "<br> $ano_mes - $mes - $ano_mes2";

	return $ano_mes;
}

// Monta o cabeçalho p/ o rel de contabilidade 1
function fincrementaauxiliar($mes, $ano, $incrementa, $turma, $mestre_relatorio, $ano_mes)
{
	
	if ($incrementa == "+") $qtd = "1";
	if ($incrementa == "-") $qtd = "-1";
	
	while ($mes <= 12)
	{
	
		mysql_select_db($nomeDb);
		$query = "SELECT DISTINCT numerico1, sequencia
				  FROM auxiliar 
				  WHERE relatorio = '$mestre_relatorio'
				  AND ano_mes = '$ano_mes'
				  AND string1 = '$turma'
				  ORDER BY relatorio, ano_mes";
		$result = mysql_query($query);
		while ($coluna=mysql_fetch_row($result))
		{
			$total = $coluna[0]; 
			$sequencia = $coluna[1];
	
			$ano_mes = $ano.$mes;
			
			$total = $qtd + $total;
			$cont++;

			$inserea = "UPDATE auxiliar
						SET numerico1 = '$total'
						WHERE relatorio = '$mestre_relatorio'
						AND sequencia = '$sequencia' ";
			$resulta = mysql_query($inserea);

//	echo "<br> $inserea";
			$ano_mes = fincrementaanomes($ano_mes);
			$mes++;
			$mes = fzerosnafrente($mes,2);
		}
	}

	return "OK!";
}

function fincrementaalunosbolsistas($mestre_relatorio, $turma, $desconto)
{
//		$total = 0;
		
		mysql_select_db($nomeDb);
		$query = "SELECT DISTINCT numerico2, ano_mes
				  FROM auxiliar 
				  WHERE relatorio = '$mestre_relatorio'
				  AND string1 = '$turma'
				  AND ano_mes = '$desconto'
				  ORDER BY relatorio ";
		$result = mysql_query($query);
//echo "<br> $query ";
		while ($coluna=mysql_fetch_row($result))
		{
			$total = $coluna[0]; 
			$des = $coluna[1];
			
			if ($total < 1) $total = 1;
			 
			$total = $total + 1;

			$inserea = "UPDATE auxiliar
						SET numerico2 = '$total'
						WHERE relatorio = '$mestre_relatorio'
						AND string1 = '$turma'
						AND ano_mes = '$desconto' ";
//		echo "<br> $inserea - $total";
			$resulta = mysql_query($inserea);
		}
		if (!$resulta)
		{
			
			mysql_select_db($nomeDb); // criação dos cabeçalhos
			$insere = "INSERT auxiliar (relatorio, string1, ano_mes, numerico2) 
					   VALUES ('$mestre_relatorio', '$turma', '$desconto', '1') ";
			$resultd = mysql_query($insere);
//			echo "<br> $insere ";
		}
	return $total_bolsistas;
}

function modulo11($num, $base=9, $r=0)
{
//function modulo11($num, $base=9, $r=0)

	/**
	 *   Autor:
	 *           Pablo Costa <pablo@users.sourceforge.net>
	 *
	 *   Função:
	 *    Calculo do Modulo 10 para geracao do digito verificador 
	 *    de boletos bancarios conforme documentos obtidos 
	 *    da Febraban - www.febraban.org.br 
	 *
	 *   Entrada:
	 *     $num: string numérica para a qual se deseja calcularo digito verificador;
	 *     $base: valor maximo de multiplicacao [2-$base]
	 *     $r: quando especificado um devolve somente o resto
	 *
	 *   Saída:
	 *     Retorna o Digito verificador.
	 *
	 *   Observações:
	 *     - Script desenvolvido sem nenhum reaproveitamento de código pré existente.
	 *     - Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.
	 */                                        

	$soma = 0;
	$fator = 2;

	/* Separacao dos numeros */
	for ($i = strlen($num); $i > 0; $i--) {
		// pega cada numero isoladamente
		$numeros[$i] = substr($num,$i-1,1);
		// Efetua multiplicacao do numero pelo falor
		$parcial[$i] = $numeros[$i] * $fator;
		// Soma dos digitos
		$soma += $parcial[$i];
		if ($fator == $base) {
			// restaura fator de multiplicacao para 2 
			$fator = 1;
		}
		$fator++;
	}

//--------Calculo do modulo 11 
	if ($r == 0) {
		$soma *= 10;
		$digito = $soma % 11;
		if ($digito == 10) {
			$digito = 0;
		}
		return $digito;
	} elseif ($r == 1){
		$resto = $soma % 11;
		return $resto;
	}
}

function modulo11_bradesco($num, $base=7, $r=0)
{
	$soma = 0;
	$fator = 2;
	/* Separacao dos numeros */
	for ($i = strlen($num); $i > 0; $i--) {
		// pega cada numero isoladamente
		$numeros[$i] = substr($num,$i-1,1);
		// Efetua multiplicacao do numero pelo falor
		$parcial[$i] = $numeros[$i] * $fator;
		// Soma dos digitos
		$soma += $parcial[$i];
		if ($fator == $base) {
			// restaura fator de multiplicacao para 2 
			$fator = 1;
		}
		$fator++;
	}

//--------Calculo do modulo 11 
	if ($r == 0) {
		$soma *= 10;
		$digito = $soma % 11;
		if ($digito == 10) {
			$digito = "P";
		}
		return $digito;
	} elseif ($r == 1){
		$resto = $soma % 11;
		return $resto;
	}
}

function modulo10($num)
{
	/*
		Autor:
				Pablo Costa <pablo@users.sourceforge.net>
		Função:
				Calculo do Modulo 10 para geracao do digito verificador 
				de boletos bancarios conforme documentos obtidos 
				da Febraban - www.febraban.org.br 
		Entrada:
				$num: string numérica para a qual se deseja calcular o digito verificador;
		Saída:
				Retorna o Digito verificador.
		Linguagem:
				PHP.
		Observações:
				- Script desenvolvido sem nenhum reaproveitamento de código pré existente.
				- Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.
	*/                                        

	$numtotal10 = 0;
	$fator = 2;

	// Separacao dos numeros
	for ($i = strlen($num); $i > 0; $i--) {
		// pega cada numero isoladamente
		$numeros[$i] = substr($num,$i-1,1);
		// Efetua multiplicacao do numero pelo (falor 10)
		$parcial10[$i] = $numeros[$i] * $fator;
		// monta sequencia para soma dos digitos no (modulo 10)
		$numtotal10 .= $parcial10[$i];
		if ($fator == 2) {
			$fator = 1;
		} else {
			$fator = 2;		// intercala fator de multiplicacao (modulo 10)
		}
	}

	$soma = 0;
	// Calculo do modulo 10
	for ($i = strlen($numtotal10); $i > 0; $i--) {
		$numeros[$i] = substr($numtotal10,$i-1,1);
		$soma += $numeros[$i];				
	}

	$resto = $soma % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;
}

// Verifica se a materia da turma esta no mataluno
function fVerificaMatturmaNoMataluno($cod_turma, $mataluno_cod_aluno, $cod_materia)
{
	$encontrou = 0;
	$query = "SELECT cod_materia, cod_turma, cod_aluno
			   FROM mataluno 
			   WHERE cod_turma = '$cod_turma' 
			   AND cod_aluno = '$mataluno_cod_aluno' 
			   AND cod_materia = '$cod_materia'";
	$result = mysql_query($query);
	while ($coluna=mysql_fetch_row($result))
	{
		$encontrou = 1;
	}
	return $encontrou;
}

function fVerificaAlunoCancelado($aluno_cod_aluno)
{
	$matriculado = "N";
	$query = "SELECT cod_materia, cod_turma, cod_aluno
			  FROM mataluno 
			  WHERE cod_aluno = '$aluno_cod_aluno' 
			  AND dt_cancel = '0000-00-00' ";
	$result = mysql_query($query);
	while ($coluna=mysql_fetch_row($result))
	{
		$matriculado = "S";
	}
	return $matriculado;
}

function cores($sel=0) { 
    $cor = "Selecione"; 
    $rel_crs  = "<option value='$cor' "; 
    $rel_crs .= ($cor=$sel) ? "selected " : ""; 
    $rel_crs .= " >Selecione a Cor</option>\n"; 
    $crs=Array(); 
    $c = Array('00','33','66','99','CC','FF'); 
    for($i=0;$i<6;$i++) 
    { 
        for($j=0;$j<6;$j++) 
        { 
            for($k=0;$k<6;$k++) 
            { 
                $crs[] = $c[$i].$c[$j].$c[$k]; 
            } 
        } 
    } 
    foreach($crs as $cor) 
    { 
        $rel_crs.= "<option STYLE='background-color:#$cor' value=$cor "; 
        $rel_crs.= ($cor==$sel) ? "selected " : ""; 
        $rel_crs.= " > &nbsp; $cor &nbsp;</option>\n"; 
    } 
    return $rel_crs; 
} 

/* 
    Esta função recebe um valor numérico e retorna uma string contendo o 
    valor de entrada por extenso. 
    entrada: $valor (use ponto para centavos.) 
    Ex.: 

    echo extenso("12428.12"); //retorna: doze mil, quatrocentos e vinte e oito reais e doze centavos 

    ou use: 
    echo extenso("12428.12", true); //esta linha retorna: Doze Mil, Quatrocentos E Vinte E Oito Reais E Doze Centavos 

    saída..: string com $valor por extenso em reais e pode ser com iniciais em maiúsculas (true) ou não. 

    também é possível passar o valor para a funcao com a víirgula decimal. 

    exemplo: echo extenso("12428,12"); // o retorna é o mesmo que a passagem com ponto decimal 
*/ 
function fextensovalor($valor=0, $maiusculas=false) 
{ 
    // verifica se tem virgula decimal 
    if (strpos($valor,",") > 0) 
    { 
      // retira o ponto de milhar, se tiver 
      $valor = str_replace(".","",$valor); 

      // troca a virgula decimal por ponto decimal 
      $valor = str_replace(",",".",$valor); 
    } 

    $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão"); 
    $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões"); 

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"); 
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"); 
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove"); 
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove"); 

    $z=0; 

    $valor = number_format($valor, 2, ".", "."); 
    $inteiro = explode(".", $valor); 
    for($i=0;$i<count($inteiro);$i++) 
        for($ii=strlen($inteiro[$i]);$ii<3;$ii++) 
            $inteiro[$i] = "0".$inteiro[$i]; 

     $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2); 
    for ($i=0;$i<count($inteiro);$i++) { 
        $valor = $inteiro[$i]; 
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]]; 
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]]; 
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : ""; 

        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && 
$ru) ? " e " : "").$ru; 
        $t = count($inteiro)-1-$i; 
        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : ""; 
        if ($valor == "000")$z++; elseif ($z > 0) $z--; 
        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && 
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r; 
    } 

         if(!$maiusculas){ 
                          return($rt ? $rt : "zero"); 
         } else { 
                          return (ucwords($rt) ? ucwords($rt) : "Zero"); 
         } 

} 

 /* Esta função recebe um valor numérico e retorna uma string contendo o  
    valor de entrada por extenso.  
    entrada: $valor (use ponto para centavos.)  
    Ex.:  

    echo extenso("12428.12"); //retorna: doze mil, quatrocentos e vinte e oito reais e doze centavos  

    ou use:  
    echo extenso("12428.12", true); //esta linha retorna: Doze Mil, Quatrocentos E Vinte E Oito Reais E Doze Centavos  

    saída..: string com $valor por extenso em reais e pode ser com iniciais em maiúsculas (true) ou não.  

Em vez de imprimir no caso: Doze Mil, Quatrocentos E Vinte E Oito Reais E Doze Centavos. 
              esta imprimi: Doze Mil, Quatrocentos e Vinte e Oito Reais e Doze Centavos. 

          É Muito Mais Bonito, Não?  
*/  

function fnomeescola($cod_escola) 
{
	$query = "SELECT DISTINCT nome, fantasia
			  FROM escola
			  WHERE cod_escola = '$cod_escola' ";
	$result = mysql_query($query);
	while ($coluna=mysql_fetch_row($result))
	{
		$escola_nome = $coluna[0];
		$escola_fantasia = $coluna[1];
//		echo "$escola_cod_escola - $escola_nome - $escola_fantasia";
	}
	if ($cod_escola < 1 and $cod_escola <> "") $escola_nome = "Todas as Escolas";
	return $escola_nome;
}

function fextensonumero($valor=0, $maiusculas=false) {  
    $singular = array(" ", " ", "mil", " ", " ", " ", "");  
    $plural = array(" ", " ", "mil", " ", " ", " ", " ");  

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");  
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");  
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");  
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");  

    $z=0;  

    $valor = number_format($valor, 2, ".", ".");  
    $inteiro = explode(".", $valor);  
    for($i=0;$i<count($inteiro);$i++)  
        for($ii=strlen($inteiro[$i]);$ii<3;$ii++)  
            $inteiro[$i] = "0".$inteiro[$i];  

    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);  
    for ($i=0;$i<count($inteiro);$i++) {  
        $valor = $inteiro[$i];  
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];  
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];  
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";  

        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&  
$ru) ? " e " : "").$ru;  
        $t = count($inteiro)-1-$i;  
        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";  
        if ($valor == "000")$z++; elseif ($z > 0) $z--;  
        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];  
        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&  
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;  
    }  

         if(!$maiusculas){  
                          return($rt ? $rt : "zero");  
         } else { /* 
                     Trocando o " E " por " e ", fica muito + apresentável!  
                     Rodrigo Cerqueira, rodrigobc@fte.com.br 
                    */ 
              if ($rt) $rt=ereg_replace(" E "," e ",ucwords($rt)); 
                          return (($rt) ? ($rt) : "Zero");  
         }  

}

function umacasadecimal($valor)
{
//echo "<br> valor1 $valor";
    if ($valor <> 0)
	{
		$valor = round(($valor) , 1);
		if (strpos($valor,".") == 0) $valor = $valor.".0";
	}
//echo "<br> valor2 $valor";
	return $valor;
}


// Mostra o conteúdo de um vetor (array multidimensional) 
// $array = array a ser mostrado , $root = string a ser mostrada antes do array, ex, "<br>"
function showarray($array,$root)
{
  foreach (array_keys($array) as $element)
  {
   $my_array=$array[$element];
   if(is_array($my_array))
   {
     showarray($my_array,$root . "[" . $element . "]");
   }
   else
   {
     echo($root . "[" . $element . "]=" . $array[$element]);
   }
  }
} 

// Acrescenta numero de minutos ($incremento) a uma string ($horaminuto) no formato hh:mm
function somaminuto($horaminuto, $incremento)
{
	$hora = explode(":", $horaminuto);
	$min = $hora[0] * 60 + $hora[1] + $incremento;
	$horat = (int) ($min / 60);
	$mint = $min - ($horat * 60);
	$horario = ($horat < 10 ? "0" : "") . $horat . ":" . ($mint < 10 ? "0" : "") . $mint;
	return $horario;
}

// pega o numero e retorna na forma real ex....   4 para 4,00
function fnumeroreal($valor) 
{
	$valor = str_replace (".", ",", $valor);
	$ipode = 1;
	
	$virgula = ",";
	$valor_real = strrpos($valor, $virgula);

	if ($valor_real == "") 
	{
		$valor = $valor.",00";
		$ipode = 0;
//		echo "real $valor_real";
	}
//		echo "real $valor_real";

	if ($valor_real <> "")
	{
		$valor_a = substr($valor,$valor_real,5);
//		echo "<br> a $valor_a";
		$tamanho = strlen($valor_a);
//		echo "<br> t $tamanho";
		if ($tamanho == 2) 
		{
			$valor = $valor."0";
//			echo "entrou";
		}
	}
	
	if ($ipode == 1)
	{
		$inteiro = $valor_real + 3;
//		echo "<br>dentro $valor";
		$valor = substr($valor,0,$inteiro);
//		echo "<br>fora $valor";
	}

	return $valor;
}

// recebe uma string e verifica se está incluida no campo controle do arquivo mestre
function fcontrole($palavra) 
{
	$controle = "";
	
	mysql_select_db($nomeDb);
	$query3 = "SELECT autoriz_func
			   FROM mestre 
			   WHERE 1" ;
	$matriz_mestre3 = mysql_query($query3);
	while ($coluna_mestre3=mysql_fetch_row($matriz_mestre3)) 
	{
		$controle = $coluna_mestre3[0];
	}
	
	if ($controle <> "") $posicao = strpos($controle, $palavra);
	if ($controle == "") $posicao = "<br> Campo controle no arquivo mestre em branco!!!";
	return $posicao;
}

function fdeletaauxiliar($relatorio) 
{
	$sql = mysql_query ("DELETE FROM auxiliar WHERE relatorio = '$relatorio'") ;
//	echo "<br> $sql";
	return $relatorio;
}


// matriz com as siglas, nome dos estados e selecionado (1-sim, 0-não)
$estados[0] = array ("AC","Acre",0);
$estados[1] = array ("AL","Alagoas",0);
$estados[2] = array ("AP","Amapa",0);
$estados[3] = array ("AM","Amazonas",0);
$estados[4] = array ("BA","Bahia",0);
$estados[5] = array ("CE","Ceara",0);
$estados[6] = array ("DF","Distrito Federal",0);
$estados[7] = array ("ES","Espirito Santo",0);
$estados[8] = array ("GO","Goias",0);
$estados[9] = array ("MA","Maranhao",0);
$estados[10] = array ("MT","Mato Grosso",0);
$estados[11] = array ("MS","Mato Grosso do Sul",0);
$estados[12] = array ("MG","Minas Gerais",0);
$estados[13] = array ("PA","Para",0);
$estados[14] = array ("PB","Paraiba",0);
$estados[15] = array ("PR","Paraná",0);
$estados[16] = array ("PE","Pernambuco",0);
$estados[17] = array ("PI","Piaui",0);
$estados[18] = array ("RN","Rio Grande do Norte",0);
$estados[19] = array ("RS","Rio Grande do Sul",0);
$estados[20] = array ("RJ","Rio de Janeiro",0);
$estados[21] = array ("RO","Rondonia",0);
$estados[22] = array ("RR","Roraima",0);
$estados[23] = array ("SC","Santa Catarina",0);
$estados[24] = array ("SP","Sao Paulo",0);
$estados[25] = array ("SE","Sergipe",0);
$estados[26] = array ("TO","Tocantins",0);
$estados[27] = array ("OU","Outros",0);
?>
<?
$civil[0] = array ("1","Solteiro(a)",0);
$civil[1] = array ("2","Casado(a)",0);
$civil[2] = array ("3","Divorciado(a)",0);
$civil[3] = array ("4","Amasiado(a)",0);
$civil[4] = array ("5","Viuvo(a)",0);
$civil[5] = array ("6","Outros",0);
?>
<?
$tipoaula[0] = array ("1","Normal",0);
$tipoaula[1] = array ("2","Assistência",0);
$tipoaula[2] = array ("3","Revisão",0);
$tipoaula[3] = array ("4","Contra_turno",0);
?>
<?
// tipo de sangue
$tiposangue[0] = array ("1"," ",0);
$tiposangue[1] = array ("2","A+",0);
$tiposangue[2] = array ("3","A-",0);
$tiposangue[3] = array ("4","B+",0);
$tiposangue[4] = array ("5","B-",0);
$tiposangue[5] = array ("6","O+",0);
$tiposangue[6] = array ("7","O-",0);
$tiposangue[7] = array ("8","AB+",0);
$tiposangue[8] = array ("9","AB-",0);
?>
<?
// Nome dos meses
$nome_mes[1] = "janeiro";
$nome_mes[2] = "fevereiro";
$nome_mes[3] = "março";
$nome_mes[4] = "abril";
$nome_mes[5] = "maio";
$nome_mes[6] = "junho";
$nome_mes[7] = "julho";
$nome_mes[8] = "agosto";
$nome_mes[9] = "setembro";
$nome_mes[10] = "outubro";
$nome_mes[11] = "novembro";
$nome_mes[12] = "dezembro";
?>
<?
// Nome dos meses
$escolaridade[1] = array ("1","Ensino Fundamental Incompleto",0);
$escolaridade[2] = array ("2","Ensino Fundamental Completo",0);
$escolaridade[3] = array ("3","Ensino Médio Incompleto",0);
$escolaridade[4] = array ("4","Ensino Médio Completo",0);
$escolaridade[5] = array ("5","Graduação Incompleta",0);
$escolaridade[6] = array ("6","Graduado - Bacharelado",0);
$escolaridade[7] = array ("7","Graduado - Licenciatura",0);
$escolaridade[8] = array ("8","Pós-Graduação Incompleta",0);
$escolaridade[9] = array ("9","Pós-Graduado",0);
$escolaridade[10] = array ("10","Mestrado Incompleto",0);
$escolaridade[11] = array ("11","Mestre",0);
$escolaridade[12] = array ("12","Vago",0);
?>
<?
$tipo_professor[1] = array ("1","Professor",0);
$tipo_professor[2] = array ("2","Professor Assistente",0);
$tipo_professor[3] = array ("3","Corretor de Redação",0);
$tipo_professor[4] = array ("4","Vago",0);
?>
<?
$situacao[0] = array ("P","Pendente");
$situacao[1] = array ("O","OK");
$situacao[2] = array ("B","B&C");
$situacao[3] = array ("C","Cancelado");
$situacao[4] = array ("N","Negociacao");

?>
