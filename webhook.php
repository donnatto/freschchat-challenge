<?php
$auth_token = $_SERVER['HTTP_X_FRESHCHAT_SIGNATURE'];
$wh_auth = getenv('WH_AUTH');
$api_token = getenv('FRESHCHAT_API_TOKEN');
$url='https//api.freshchat.com/v2/';

if (file_exists('request.log')) {
  $log = readfile('request.log');
  var_dump($log);
}

if (strcmp($auth_token, $wh_auth) == 0) {
  header('Content-Type: application/json');
  $request = file_get_contents('php://input');
  $req_dump = print_r( $request, true );
  $fp = file_put_contents('request.log', $req_dump );
} else {
  $request = "you don't have access to this";
  $fp = file_put_contents('request.log', $request);
}

?>