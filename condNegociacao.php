<br><br><br>
<meta charset="utf-8">
<?php 
    include("conexao.php");
    $cod_merc = $_GET['cod_merc'];//recebe o codigo da mercadoria

?>

<script type='text/javascript'>

if(confirm('Você deseja mesmo negociar essa mercadoria?\n\n Click "OK" para Confirmar!\n')) {//lança uma sentença pra confirmação da negociação

	 
     location.href="form_editar.php?acao=redirect&cod_merc=<?=$_GET['cod_merc']?>";//envia os dados para form_editar.php, onde serão tratadas as informação selecionadas

}else{
	
	location.href="index.php";//caso contrario retorna a pagina anterior
}
</script>