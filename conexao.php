<?php
$conexao = @mysql_connect("localhost","root","")or die("Falha na Conexao!");
$bd = mysql_select_db("BD_mercadoria",$conexao);
?>