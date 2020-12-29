<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); 
if(session_status() == 0) echo "Desabilitada ";
if(session_status() == 1) echo "inexistente ";
if(session_status() == 2) echo "Existente ";
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
if(session_status() == 0) echo "Agora Desabilitada ";
if(session_status() == 1) echo "Agora inexistente ";
if(session_status() == 2) echo "Agora Existente ";
}
?>

<h1>Rotas</h1>
<hr />

<?php if ($db) : ?>
<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="customers/add.php" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-plus fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Nova Distância</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="customers" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-map fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Distância</p>
				</div>
			</div>
		</a>
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>