<br><br><br>
<meta charset="utf-8">
<?php 
    include("conexao.php");
    $cod_merc = $_GET['cod_merc'];
    
?>

<script type='text/javascript'>

if(confirm('Você deseja mesmo negociar essa mercadoria?\n\n Click "OK" para Confirmar!\n')) {
	 
     // location.href="remove.php?acao=redirect&codUsuario=<?=$_GET['codUsuario']?>";

}else{
	
	location.href="ListaMateriais.php";
}
</script>