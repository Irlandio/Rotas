<?php
    require_once('functions.php');
    index();
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
session_start();}
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Distâncias de CEPs</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova Distância</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); /// verificar?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th >Origem</th>
		<th>Destino</th>
		<th>Distância</th>
		<th>Criado em</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($ceps) : ?>
<?php foreach ($ceps as $cep) : ?>
	<tr>
		<td><?php echo $cep['id']; ?></td>
		<td><?php echo $cep['cepOrig']; ?></td>
		<td><?php echo $cep['cepDest']; ?></td>
		<td><?php echo $cep['dist']; ?></td>
		<td><?php echo $cep['criado']; ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $cep['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $cep['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-cep="<?php echo $cep['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
<?php 
 // $row_set = array();
 // $row_set = validaCep();
 //   validaCep();
	echo '<br>';
//	echo 'LATIDUDE: '.$row_set->latitude;

  // foreach ($row_set as $r) { echo $r.'<br>';}
	echo '<br>';
	//echo 'LATIDUDE: '.$row_set->latitude;
	echo '<br>';
	//echo 'LONGITUDE: '.$row_set->longitude;
	echo '<br>';
/*
*/
include(FOOTER_TEMPLATE); ?>