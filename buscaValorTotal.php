<?php
 include("conexao.php");

 $preco = $_POST['preco'];
 $quantNeg = $_POST['quantNeg'];
 
            
$total= $preco*$quantNeg;
echo "$total";

?>