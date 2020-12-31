<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); 
  
?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $cep['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-2">
      <label for="name">CEP Origem</label>
      <input type="text" class="form-control" name="cep['cepOrig']" value="<?php echo $cep['cepOrig']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Endereço Origem</label>
      <input type="text" class="form-control" name="cep['endOrig']" value="<?php echo $cep['endOrig']; ?>">
    </div>
    
    <div class="form-group col-md-3">
      <label for="campo2">Coordenadas</label>
      <div class="row">

        <dl class="dl-horizontal">
            <dt>Latitude:</dt>
            <dd><input type="text" class="form-control" name="cep['latO']" disabled value="<?php echo $cep['latO']; ?>"></dd>

            <dt> Longetude:</dt>
            <dd><input type="text" class="form-control" name="cep['longO']" disabled value="<?php echo $cep['longO']; ?>"></dd>
        </dl>


      </div>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo2">CEP Destino</label>
      <input type="text" class="form-control" name="cep['cepDest']" value="<?php echo $cep['cepDest']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Endereço Destino</label>
      <input type="text" class="form-control" name="cep['endDest']" value="<?php echo $cep['endDest']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Coordenadas</label>
      <div class="row">

        <dl class="dl-horizontal">
            <dt>Latitude:</dt>
            <dd><input type="text" class="form-control" name="cep['latD']" disabled value="<?php echo $cep['latD']; ?>"></dd>

            <dt> Longetude:</dt>
            <dd><input type="text" class="form-control" name="cep['longD']" disabled value="<?php echo $cep['longD']; ?>"></dd>
        </dl>


      </div>
  </div>
  </div>
  <div class="row">
   
    <div class="form-group col-md-2">
      <label for="campo1">Distância Km</label>
      <input type="text" class="form-control" name="cep['dist']" disabled value="<?php echo $cep['dist']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de cadastro</label>
      <input type="text" class="form-control" name="cep['criado']" disabled value="<?php echo $cep['criado']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="campo3">Data de modificação</label>
      <input type="text" class="form-control" name="cep['modificado']" disabled value="<?php echo $cep['modificado']; ?>">
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>



