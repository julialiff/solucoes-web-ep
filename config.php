<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once 'vendor/autoload.php';

$ops = array(
  "profile" => "each",
  "region" => "us-east-2",
  "version" => "latest"
);

// S3 bucket
$clientS3 = new Aws\S3\S3Client($ops);
$clientS3->registerStreamWrapper();

$chave_api = file_get_contents('s3://each-api-sptrans/chave_sptrans.txt');

$cookie = '/tmp/cookie.txt';
$url = 'http://api.olhovivo.sptrans.com.br/v2.1';

//echo $url . '/Login/Autenticar?token=' . $chave_api;
?>
