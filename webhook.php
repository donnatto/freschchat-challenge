<?php
$signature = $_SERVER['HTTP_X_FRESHCHAT_SIGNATURE'];
$public_key = getenv('WH_AUTH');
$api_token = getenv('FRESHCHAT_API_TOKEN');
$url='https//api.freshchat.com/v2/';

if (file_exists('request.log')) {
  $log = readfile('request.log');
  var_dump($log);
}

header('Content-Type: application/json');
$request = file_get_contents('php://input');
// Verificamos el request con la firma y nuestra clave publica
$verify = openssl_verify($request, $signature, $public_key);
if ($verify == 1) {
  $req_dump = print_r( $request, true );
  $fp = file_put_contents('request.log', $req_dump );
} else {
  $message = "You don't have permission to do this";
  $fp = file_put_contents('request.log', $message);
}

?>