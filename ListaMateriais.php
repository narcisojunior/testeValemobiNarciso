<?php 
      if(isset($_POST['btnBuscar'])){
      include("conexao.php");
      $q = $_POST['b'];
       
      $sql = "SELECT * FROM mercadoria where nome LIKE '%$q%'";
      $retorno = mysql_query($sql, $conexao)or die("Falha na criacao da DATABASE ");

      }else{
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
    <title>TesteValemobi</title>
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
        <td align = "left"; bgcolor = "#d3d3d3"><h1 > Teste Valemobi</h1></td>
        <td align = "left"; bgcolor = "#d3d3d3" width = "38%"><h3 > </h3></td>
        <td align = "right"; bgcolor = "#d3d3d3"><label>Digite o nome da Mercadoria:</label>
        <td align = "left"; bgcolor = "#d3d3d3"> <input type="text"name ="b" id"b">
        <input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar" class="btn btn-primary" ></td>
        </TABLE></div>

      </form>
     
         
             <table class="table table-bordered" border = "1" align = "center" cellpadding ="1" cellspacing ="0" ><br>
              <tr>
                    <th bgcolor = "#d3d3d3" width = "center" align = "left" valign = "middle" scope ="col">codigo:</th>
                    <th bgcolor = "#d3d3d3" width = "center" align = "left" valign = "middle" scope ="col">Mercadoria:</th>
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
                           
                           $row["tipo_neg"]="Venda";
                    
                    }else $row["tipo_neg"]="Compra";
                    ?>

                    <td align = "left" valign = "middle" ><?php echo $row["cod_merc"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["tipo_merc"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["nome"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["quant"];?></td>
                    <td align = "left" valign = "middle" >$ <?php echo $row["preco"];?></td>
                    <td align = "left" valign = "middle" ><?php echo $row["tipo_neg"];?></td>
                    <td width = "7%"  align = "center" valign = "middle" ><?php echo "<a href = 'condNegociacao.php?&cod_merc=".$row['cod_merc']."'>
                    <img src = neg.jpg alt=home title = negociar mercadoria selecionada  width =35 height = 35 ></a><br>"; ?></td>
                   
              </tr>
              <?php } ?>
             </table>
      </body>
</html>
