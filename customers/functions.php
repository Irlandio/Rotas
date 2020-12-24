<?php

require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $customers;
	$customers = find_all('ceps');
}
/**
 *  Cadastro de Clientes
 */
function add() {
       
    if(isset ($customer))
        {

      if (!empty($_POST['customer'])) {

        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

        $customer = $_POST['customer'];
        $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");

        save('ceps', $customer);
        header('location: index.php');
      }
    }
   
      //  header('location: add.php');
}
/**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['customer'])) {

      $customer = $_POST['customer'];
      $customer['modified'] = $now->format("Y-m-d H:i:s");

      update('customers', $id, $customer);
      header('location: index.php');
    } else {

      global $customer;
      $customer = find('customers', $id);
    } 
  } else {
    header('location: index.php');
  }
}

function validaCep($cep) {
    $token =  "1b3b95b1f7ceccd9bdcec4fd1205cd03";
  //  $cep = '89030500';
	// Recebe o CEP
    $curl = curl_init( 'https://www.cepaberto.com/api/v3/cep?cep='.$cep);
	// Adiciona o token no cabeçalho
	curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Authorization: Token token="'.$token.'"' ) );
    
	//$latlng = curl_exec( $curl );
//	$row_set = json_decode( $latlng );
	// Não imprime na tela
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
	// Executa
	$latlng = curl_exec( $curl );
	// Fecha pra economizar memória
	curl_close( $curl );
   // if($latlng)
	// Converte para Array
	$row_set = json_decode( $latlng );
 //   $row_set =  print preg_replace("/(.+?)(,|)/", '"$1"$2', implode(',', $row_set));
 //  $row_set =   json_decode(array('itens' => $latlng));
//	$row_set = json_encode( $latlng );
	//echo json_decode( $row_set );
    
    //   foreach ($latlng as $row){ $row_set[] = array('latitude'=>$row['latitude'],'longitude'=>$row['longitude']); }
  //  else 
//	$latlng = array('"cidade": {"ibge": "0", "nome": "0", "ddd": 0}, "estado": {"sigla": "0"}, "altitude": 0, "longitude": "0", "bairro": "0", "complemento": "0", "cep": "0", "logradouro": "0", "latitude": "-23.5479099981"');
    
  return $row_set;
}