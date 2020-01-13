<?php
$signature = $_SERVER['HTTP_X_FRESHCHAT_SIGNATURE'];
$public_key = getenv('WH_AUTH');
$api_token = getenv('FRESHCHAT_API_TOKEN');
$url='https//api.freshchat.com/v2/';

if (file_exists('request.log')) {
  $log = readfile('request.log');
  var_dump($log);
}

$request = file_get_contents('php://input');
$fp = file_put_contents('request.log', $request);

?>