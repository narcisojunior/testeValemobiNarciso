
<html>
  <head>

    <meta charset="utf-8">
    <title>Negociacao</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
      </head>
       <SCRIPT TYPE="text/javascript">

  function validar(){//valida o campo quantidade para negociação
    
    if(document.cadastro.quantNeg.value==""){
        window.alert("você deve preencher o campo Quantidade para Negociação.");
        document.cadastro.quantNeg.focus();
       
        
   }else if(confirm('Você deseja mesmo finalizar essa operação?\n\n Click "OK" para Confirmar!\n')){//lança uma sentença pra confirmação da operação

      document.cadastro.action= "update.php";//recolhe os imputs selecionados para realizar o update.php
    }else{
      location.href="index.php";//se nao retorna  a msm pagina
    }
       
}
function verificaQuant(){//metodo para verificar a quantidade de negociação com a quantidade da mercadoria
    
    quantidade = document.getElementById("quant").value;
    quantNeg = document.getElementById("quantNeg").value;//variaveis para o tratamento de verificação de quantidade
    tipo_neg = document.getElementById("tipo_neg").value;
    
    if((quantNeg > quantidade || quantNeg <= 0) && (tipo_neg.localeCompare("Venda"))){//aqui se a quantidade de negocição for maior 
      //q a quantidade do produto ou a quantidade para negociação for menor igual a 0 e o tipo de negociação nao igual a Venda
      
      window.alert("Valor de Negociação Incorreto!!.");//mostra alerta 
      document.getElementById("quantNeg").value = "";
      document.getElementById("valorTotal").value = "";//zera os campos
    }else{
     carregaValorTotal();
    }
}
function carregaValorTotal(){//ajax carrega as informações para tratamento em tempo real do valor total
 valorTotal = document.getElementById("preco").value;
 val2 = document.getElementById("quantNeg").value;
 

       Envia(valorTotal, val2);
      
      }



function Envia(valorTotal,val2){//envia as variaveis para tratamento 
 var requisicaoAjax = iniciaAjax();
 valorTotal = document.getElementById("preco").value;
 val2 = document.getElementById("quantNeg").value; 
   
 
    if (requisicaoAjax) {
        requisicaoAjax.onreadystatechange = function(){
            if (requisicaoAjax.readyState == 4) {
                if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304){
                    document.getElementById("valorTotal").value = requisicaoAjax.responseText;//campo ValorTotal recebe a requisição do ajax
                }else{
                    alert("Problema na comunicação");
                }
            }
        };
        requisicaoAjax.open("POST", "buscaValorTotal.php", true);//as variaveis para tratamento são enviadas para buscaValorTotal onde serão tratadas
        requisicaoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        requisicaoAjax.send("preco="+valorTotal+"&quantNeg="+val2);
    }
}

function iniciaAjax(){//metodo para iniciação do ajax
    var objetoAjax = false;
    if (window.XMLHttpRequest) {
        objetoAjax = new XMLHttpRequest();
    }else if(window.ActiveXObject){
        try{
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(e){
            try{
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(ex){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}
</SCRIPT>
        <body>
            
             <?php
             
             include("conexao.php");
             $cod_merc = $_GET["cod_merc"];//recebe o codigo enviado por condNegociacao
             $sql = "SELECT * FROM mercadoria where cod_merc ='$cod_merc' ";//seleciona a mercadoria pelo codigo
             $retorno = mysql_query($sql, $conexao)or die("Falha na criacao da DATABASE");
             $row = mysql_fetch_assoc($retorno);//armazena as informações em um array
             if($row["tipo_neg"]==1){//verifica tipo de negociação e renomeia Venda ou Compra
                           
                           $row["tipo_neg"]="Venda";
                    
                    }else $row["tipo_neg"]="Compra";

             ?>

          
          <div align = "center">
            <br><br><br>
          
           <TABLE class="table table-striped" > <h2 >Efetivar Transação:</h2>
            <td width = "42%"></td></TABLE>
           
           
            <TABLE>
            <br>   
          <center>
          <td width = "1%"></td>
          <TD  width = "57%" align ="left">
          <form method = "POST" action = "" name="cadastro"><!--Form para recolher as variaveis da mercadoria que está em negociação -->
          <h4>Código:<br>
          <input type = "hiddem"  size ="25" name = "cod_merc" id="cod_merc" readonly="readonly" value="<?php echo $row["cod_merc"];?>" ><br></h4> 
          <h4>Tipo Mercadoria:<br><input type = "text"  size ="25" name = "tipo_merc" readonly="readonly" value="<?php echo $row["tipo_merc"];?>"><br>
          <h4>Nome:<br><input type = "text" size ="25" name = "nome" readonly="readonly" value="<?php echo $row["nome"];?>"><br></h4>
          <h4>Quantidade:<br><input type = "int" size ="25" name = "quant" id="quant"readonly="readonly" value="<?php echo $row["quant"];?>"><br></h4>
          <h4>Valor:<br><input type = "text" size ="25" name = "preco" readonly="readonly" id="preco" value=<?php echo $row["preco"];?>><br></h4>

          <h4>Tipo do Negocio:<br><input type = "text" size ="25" name = "tipo_neg" readonly="readonly" id="tipo_neg" value="<?php echo $row["tipo_neg"];?>"><br></h4><br>
          <h4>Quantidade para Negociação:<br><input type = "text" size ="25" name = "quantNeg" id="quantNeg" onchange = "verificaQuant();" value=""><!-- Ao modificar o campo chama metodo verificaQuant -->
          <h4>Valor Total $:<br> <input type ="text" size ="25" readonly="readonly" name="valorTotal" id="valorTotal" value ="" ><br></h4><!-- recebe o resultado do ajax em tempo real-->
            <br><br>
            <input type="submit" value="Finalizar" class="btn btn-success" id ="button" onclick="validar();"> <!-- chama metodo validar antes de finalizar -->
            <input type="button" value="Cancelar" class="btn btn-primary" onclick="window.open('index.php', '_parent');" />             
            <br><br><br><br>
            </form>       
            </TD>
            </center>
            </TABLE>
          </div>
        </body>
    </html>