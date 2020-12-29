<?php

require_once('../config.php');
require_once(DBAPI);

$ceps = null;
$cep = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $ceps;
	$ceps = find_all('ceps');
}
/**
 *  Cadastro de Clientes
 */
function add($cePs) {
       
    if(isset ($cePs))
        {

      if (!empty($cePs)) {

        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

     //   $cePs = $_POST['cePs'];
     //   $cePs['modificado'] = $cePs['criado'] = $today->format("Y-m-d H:i:s");

          save('ceps', $cePs);
        header('location: index.php');
      }
    }
   
}
/**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['cep'])) {

      $cep = $_POST['cep'];
      $cep['modified'] = $now->format("Y-m-d H:i:s");

      update('ceps', $id, $cep);
      header('location: index.php');
    } else {

      global $cep;
      $cep = find('ceps', $id);
    } 
  } else {
    header('location: index.php');
  }
}

function calcDistancia($lat_inicial, $long_inicial, $lat_final, $long_final)
{
    $d2r = 0.017453292519943295769236;

    $dlong = ($long_final - $long_inicial) * $d2r;
    $dlat = ($lat_final - $lat_inicial) * $d2r;

    $temp_sin = sin($dlat/2.0);
    $temp_cos = cos($lat_inicial * $d2r);
    $temp_sin2 = sin($dlong/2.0);

    $a = ($temp_sin * $temp_sin) + ($temp_cos * $temp_cos) * ($temp_sin2 * $temp_sin2);
    $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

    return 6368.1 * $c;
}

function validaCep($cep) {
    $token =  "1b3b95b1f7ceccd9bdcec4fd1205cd03";
	// Recebe o CEP
    $curl = curl_init( 'https://www.cepaberto.com/api/v3/cep?cep='.$cep);
	// Adiciona o token no cabeçalho
	curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Authorization: Token token="'.$token.'"' ) );
    
	// Não imprime na tela
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
	// Executa
	$latlng = curl_exec( $curl );
	// Fecha pra economizar memória
	curl_close( $curl );
	// Converte para Array
	$row_set = json_decode( $latlng );
    
  return $row_set;
}
function clear_messages(){
    unset($_SESSION['message']);
}