<?php 
      if(isset($_POST['btnBuscar'])){//se botão busca for acionado essa condição filtra a mercadoria 
      include("conexao.php");
      $q = $_POST['b'];       //recebe o id imput busca para selecionar a mercadoria desejada
       
      $sql = "SELECT * FROM mercadoria where nome LIKE '%$q%'";//seleciona todas mercadoris com trexo do nome digitado
      $retorno = mysql_query($sql, $conexao)or die("Falha na criacao da DATABASE ");//

      }else{//se nao busca todas as mercadorias no banco e exibe na tela
      include("conexao.php");
      $sql = "SELECT * FROM mercadoria ";
      $retorno = mysql_query($sql, $conexao)or die("Falha na criacao da DATABASE");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Teste</title>         <!-- utilizando biblioteca Bootstrap-->
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
  </head>

  </head>
   <body ><br>

        <form id="form" name="form" method ="Post" action="">
        <label for="b"></label>
        
        <div align = "center" ><TABLE class="table table-striped" width = "98%"><td align = "left"; bgcolor = "#d3d3d3" >
        <td align = "left"; bgcolor = "#d3d3d3"><h1 > Teste</h1></td>
        <td align = "left"; bgcolor = "#d3d3d3" width = "38%"><h3 > </h3></td><!-- Imput para busca de mercadoria-->
        <td align = "right"; bgcolor = "#d3d3d3"><label>Digite o nome da Mercadoria:</label>
        <td align = "left"; bgcolor = "#d3d3d3"> <input type="text"name ="b" id"b">
        <input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar" class="btn btn-primary" ></td>

        </TABLE></div><!-- Tabela para exibição das mercadorias listadas-->

      </form>
     
         
             <table class="table table-bordered" border = "1" align = "center" cellpadding ="1" cellspacing ="0" ><br>
              <tr>
                    <th bgcolor = "#d3d3d3" width = "center" align = "left" valign = "middle" scope ="col">codigo:</th>
                    <th bgcolor = "#d3d3d3" width = "center" align = "left" valign = "middle" scope ="col">Tipo mercadoria:</th>
                    <th bgcolor = "#d3d3d3" align = "center" valign = "middle" scope ="col">Nome:</th>
                    <th bgcolor = "#d3d3d3" align = "center" valign = "middle" scope ="col">Quantidade:</th>
                    <th bgcolor = "#d3d3d3" align = "center" valign = "middle" scope ="col">Preço:</th>
                    <th bgcolor = "#d3d3d3" align = "center" valign = "middle" scope ="col">Tipo do Negocio</th>
                    <th bgcolor = "#d3d3d3" align = "center" valign = "middle" scope ="col">Negociar</th>
                  
              </tr>
              <?php while ($row = mysql_fetch_array($retorno)) { ?>
                <tr>
                    <?php 
                    if($row["tipo_neg"]==1){
                           
                           $row["tipo_neg"]="Venda";//condição para tipo de mercadoria boolean onde tipo 1 é venda e 0 é Compra
                    
                    }else $row["tipo_neg"]="Compra";
                    ?>
                     <!-- Tds para exibiçao dos dados da mercadoria onde as informações estão no arrey-->
                    <td align = "left" valign = "middle" ><?php echo $row["cod_merc"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["tipo_merc"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["nome"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["quant"];?></td>
                    <td align = "left" valign = "middle" >$ <?php echo $row["preco"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["tipo_neg"];?></td>
                    <td width = "7%"  align = "center" valign = "middle" ><?php echo "<a href = 'condNegociacao.php?&cod_merc=".$row['cod_merc']."'>
                    <img src = neg.jpg alt=home title = negociar mercadoria selecionada  width =35 height = 35 ></a><br>"; ?></td><!--botão que
                     seleciona o codigo para tratar das informações em codNegociacao.php-->
                   
              </tr>
              <?php } ?>
             </table>
             <input type="button" value="Voltar" class="btn btn-primary" onclick="window.open('index.php', '_parent');" /> <!-- botão de voltar caso seja filtrado uma mercadoria-->
      </body>
</html>
