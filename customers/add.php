
<?php 
  require_once('functions.php'); 

   if(isset ($_GET['cepOrigID']))
   if( 0 != $_GET['cepOrigID'] ) {
       
       
       //Se não existe variavel global ou se consulta CEP difernte faz consulta no site e alimenta as variaveis
   if(!isset ($_SESSION['cepOrig']) || (isset($_SESSION['cepOrig']) && $_SESSION['cepOrig'] != $_GET['cepOrigID']))
       {
           //Alimenta variavel global
           $_SESSION['cepOrigID'] = $_GET['cepOrigID'];
           $_SESSION['cepOrig'] = $_GET['cepOrigID'];
           $row_set             = validaCep($_SESSION['cepOrig']);        
           $_SESSION['lat1']    = $row_set->latitude;
           $_SESSION['longt1']  = $row_set->longitude;
           $_SESSION['logra1']  = $row_set->logradouro;
           $_SESSION['cidade1'] = $row_set->cidade->nome;
           $_SESSION['estado1'] = $row_set->estado->sigla;
        }}else
       {
           $_SESSION['cepOrigID'] = $_GET['cepOrigID'];
           $_SESSION['cepOrig'] = $_GET['cepOrig'];         
       
            if( isset($_GET['latitude1'] )){
               $_SESSION['lat1']    = $_GET['latitude1'];
               $_SESSION['longt1']  = $_GET['longitude1'];
               $_SESSION['logra1']  = $_GET['rua1'];
               $_SESSION['cidade1'] = $_GET['cidade1'];
            //   $_SESSION['estado1'] = $_GET['uf1'];
            }
       
   }
   if(isset ($_GET['cepDID']))
   if( 0 != $_GET['cepDID'] ){
   if(!isset ($_SESSION['cepD']) || (isset($_SESSION['cepD']) && $_SESSION['cepD'] != $_GET['cepDID']))
       {
           //Alimenta variavel global
           $_SESSION['cepDID']  = $_GET['cepDID'];
           $_SESSION['cepD']    = $_GET['cepDID'];
           $row_set             = validaCep($_SESSION['cepD'] );        
           $_SESSION['lat2']    = $row_set->latitude;
           $_SESSION['longt2']  = $row_set->longitude;
           $_SESSION['logra2']  = $row_set->logradouro;
           $_SESSION['cidade2'] = $row_set->cidade->nome;
           $_SESSION['estado2'] = $row_set->estado->sigla;
       } }else
           {
               $_SESSION['cepDID'] = $_GET['cepDID'];
               $_SESSION['cepD'] = $_GET['cepD'];  

                if( isset($_GET['latitude2'] )){
                   $_SESSION['lat2']    = $_GET['latitude2'];
                   $_SESSION['longt2']  = $_GET['longitude2'];
                   $_SESSION['logra2']  = $_GET['rua2'];
                   $_SESSION['cidade2'] = $_GET['cidade2'];
                //   $_SESSION['estado2'] = $_GET['uf2'];
                }
            }
  add();  
?>
<?php include(HEADER_TEMPLATE); ?>

    <head>
    <title>CEP da Rota</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formulário_cep(campo) {
          //  Limpa valores do formulário de cep.
                document.getElementById("latitude"+campo).value="";
                document.getElementById("longitude"+campo).value="";
                document.getElementById("rua"+campo).value="";
                document.getElementById("cidade"+campo).value="";
                document.getElementById("uf"+campo).value="";              
    }

    function meu_callback1(conteudo) {
        if (!("erro" in conteudo)) 
        {
            //Atualiza os campos com os valores.
            document.getElementById("latitude1").value=(conteudo.latitude);
            document.getElementById("longitude1").value=(conteudo.longitude);
            document.getElementById("rua1").value=(conteudo.logradouro);
            document.getElementById("cidade1").value=(conteudo.cidade.nome);
            document.getElementById("uf1").value=(conteudo.estado);
           
        }
        else {
            //CEP não Encontrado.
          //  limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep1(valor,campo) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                if(campo == 1)
                    {
                    document.getElementById("cepOrigID").value=document.getElementById("cepOrig").value;
                    document.getElementById("cepDID").value="0";
                    }
                    else  
                        if(campo == 2)
                    {
                    document.getElementById("cepDID").value=document.getElementById("cepD").value;
                    document.getElementById("cepOrigID").value="0";
                    }
                
     //  $('#cepOrigID').val(cepOrig); 
                
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById("latitude"+campo).value="Aguardando...";
                document.getElementById("longitude"+campo).value="...";
                document.getElementById("rua"+campo).value="...";
                document.getElementById("cidade"+campo).value="...";
            //    document.getElementById("uf"+campo).value="...";                
                
                document.NomedoForm.submit(); 
                //Cria um elemento javascript.
                var script = document.createElement('script');
              
                //Sincroniza com o callback.
             //   script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback1';
               
				
                <?php  
                     //   $cep = '89030500';
                        //   var_dump($cep);
                    //    $row_set = validaCep($cep); 
                    //    $lat = $row_set->latitude;
                    //    $longt = $row_set->longitude;
                
                ?>                
          //  document.getElementById(lat).value=(<?php // echo $lat; ?>);
          //  document.getElementById(longt).value=(<?php // echo $longt; ?>);
        
             //   lat.value = '<?php // $row_set->latitude; ?>';
             //   longi.value = "<?php // $row_set->longitude; ?>";
                    
              //  script.value = "<?php // $lat; ?>";
             //   scrip.value = "<?php // $rua; ?>";
             //   meu_callback1(<?php //validaCep(); ?>);
                
           //     script = new Array(<?php// $row_set ?>); 
         //   document.getElementById("latitude1").value=(lat);
         //   document.getElementById("longitude1").value=(longi);
                //Insere script no documento e carrega o conteúdo.
              //  document.body.appendChild(script);
                
        //    document.getElementById("longitude1").innerHTML = (script.latitude);
                
        
          //    $("#latitude1").val(script.latitude);
            } 
            else {
                
            limpa_formulário_cep(campo);
            alert("CEP invalido.");
            }
        } 
        else {
        }
    };
      function submitform() {
        document.NomedoForm.submit();
    }
    </script>
    
    </head>
<?php

     if(isset ($_SESSION['cepOrigID'])) { $cepOrigID = $_SESSION['cepOrigID']; }else  $cepOrigID = "0";
     if(isset ($_SESSION['cepOrig']))   { $cepOrig  = $_SESSION['cepOrig']; }   else  $cepOrig = "";
     if(isset ($_SESSION['longt1']))    { $longt1   = $_SESSION['longt1']; }    else  $longt1 = "..";
     if(isset ($_SESSION['lat1']))      { $lat1     = $_SESSION['lat1']; }      else  $lat1 = " ..";
     if(isset ($_SESSION['logra1']))    { $rua1     = $_SESSION['logra1']; }    else  $rua1 = " ..";
     if(isset ($_SESSION['cidade1']))   { $cidade1  = $_SESSION['cidade1']; }   else  $cidade1 = " ..";
     if(isset ($_SESSION['estado1']))   { $estado1  = $_SESSION['estado1']; }   else  $estado1 = " ..";


     if(isset ($_SESSION['cepDID']))    { $cepDID   = $_SESSION['cepDID']; } else  $cepDID = "0";
     if(isset ($_SESSION['cepD']))      { $cepD     = $_SESSION['cepD']; }   else  $cepD = "";
     if(isset ($_SESSION['longt2']))    { $longt2   = $_SESSION['longt2']; } else  $longt2 = "..";
     if(isset ($_SESSION['lat2']))      { $lat2     = $_SESSION['lat2']; }   else  $lat2 = " ..";
     if(isset ($_SESSION['logra2']))    { $rua2     = $_SESSION['logra2']; } else  $rua2 = " ..";
     if(isset ($_SESSION['cidade2']))   { $cidade2  = $_SESSION['cidade2']; }else  $cidade2 = " ..";
     if(isset ($_SESSION['estado2']))   { $estado2  = $_SESSION['estado2']; }else  $estado2 = " ..";
/*
echo "<br>CEP Origem ID".$_SESSION['cepOrigID'];
echo "<br>CEP Origem".$_SESSION['cepOrig'];
echo "<br>CEP lat1".$_SESSION['lat1'];
echo "<br>CEP longt1".$_SESSION['longt1'];
echo "<br>CEP cepD ID".$_SESSION['cepDID'];
echo "<br>CEP cepD".$_SESSION['cepD'];
echo "<br>CEP lat2".$_SESSION['lat2'];
echo "<br>CEP longt2".$_SESSION['longt2'];*/
    ?>
<form action="add.php" name="NomedoForm" method="get" action=".">
  <div class="row col-md-6" >
  <div class="row" >
      
    <h4>Cep Origem</h4>
 </div>
    <body>
    <!-- Inicio do formulario -->
       
        <label>Latitude:
        <input name="latitude1" type="text" id="latitude1" size="20" value="<?php echo $lat1 ?>" /></label><br />
        <label>Longitude:
        <input name="longitude1" type="text" id="longitude1" size="20" value="<?php echo $longt1 ?>" /></label><br />
        <label>Logradouro:
        <input name="rua1" type="text" id="rua1" size="30"  value="<?php echo $rua1 ?>"/></label><br />
        <label>Cidade:
        <input name="cidade1" type="text" id="cidade1" size="30" value="<?php echo $cidade1." - ".$estado1 ?>"/></label><br />
      
    </body>
 </div>

  <div class="row col-md-6" >
  <div class="row" >
      
    <h4>Cep Destino</h4>
 </div>
    <body>
    <!-- Inicio do formulario -->
       
        <label>Latitude:
        <input name="latitude2" type="text" id="latitude2" size="20"  value="<?php echo $lat2 ?>" /></label><br />
        <label>Longitude:
        <input name="longitude2" type="text" id="longitude2" size="20" value="<?php echo $longt2 ?>"  /></label><br />
        <label>Logradouro:
        <input name="rua2" type="text" id="rua2" size="30" value="<?php echo $rua2 ?>" /></label><br />
        <label>Cidade:
        <input name="cidade2" type="text" id="cidade2" size="30" value="<?php echo $cidade2." - ".$estado2 ?>" /></label><br />
      
    </body>
 </div>    
<h2>Nova Distância</h2>
  <!-- area de campos do form -->
  <hr />
  <div class="row" >
    <div class="form-group col-md-3">
      <label for="name">CEP de Origem</label>
      <input id="cepOrig" type="text" class="form-control"  value="<?php echo $cepOrig ?>" size="10" maxlength="9" onblur="pesquisacep1(this.value,1);" name="cepOrig">
      <input id="cepOrigID"  name="cepOrigID"  type="TEXT" class="form-control"   value="<?php echo $cepOrigID ?>"/>
      <input id="cepDID"     name="cepDID"     type="TEXT" class="form-control"   value="<?php echo $cepDID ?>" />
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">CEP de Destino</label>
      <input id="cepD" type="text" class="form-control"  value="<?php echo $cepD ?>" size="10" maxlength="9"
               onblur="pesquisacep1(this.value,2);"  name="cepD">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Distância</label>
      <input type="text" class="form-control" name="customer['dist']">
    </div>
  </div>  
  <div class="row">  
    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="dateTimepiker" class="form-control" name="customer['criado']" value="<?php echo date("d/m/Y H:i"); ?>" disabled>
    </div>    
  </div>  
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type='hidden' id="btnValida"   class="btn btn-primary">Salvar</button>
	    	<a class="btn btn-default" href="add.php"><i class="fa fa-refresh"></i> Atualizar</a>
    
    </div>
  </div>
</form>

<form action="add.php" method="post" action=".">
  <!-- area de campos do form -->
  <hr />
  <div class="row" >
      <input id="cepO" type="hidden" class="form-control"  value=""/>
      <input id="cepD" type="hidden" class="form-control"  value="" />
      <input type="hidden" class="form-control" name="customer['dist']"   value="" />
      <input type="hidden" class="form-control" name="customer['criado']" value="<?php echo date("d/m/Y H:i"); ?>" disabled>
  </div>  
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

  <!-- ******* Teste **** -->
  

<?php include(FOOTER_TEMPLATE); ?>