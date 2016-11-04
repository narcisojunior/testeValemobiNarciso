<br><br><br>
<div align="center">
<?php
include("conexao.php");

$cod_merc = $_POST['cod_merc'];
$quantNeg = $_POST['quantNeg'];
$tipo_neg = $_POST['tipo_neg'];//variaveis recebidas por form_editar
$quant = $_POST['quant'];


if($tipo_neg=="Compra"){//condição para tipo venda ou compra

   $quant = $quant-$quantNeg;
}else{
	$quant = $quant+$quantNeg;
}

if(mysql_query("UPDATE mercadoria set quant ='$quant' where cod_merc = '$cod_merc' ")){//realiza o update no banco

	echo "Operação efetuada com sucesso!!";
    print("<a href=\"index.php\"><br>Voltar</a>");
exit;

}else
{
echo mysql_error();
print("<a href=\"index.php\"><br>Voltar</a>");
}

?>
</div>