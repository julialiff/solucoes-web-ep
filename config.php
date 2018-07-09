<?php
require_once 'vendor/autoload.php';

$ops = array(
  "profile" => "default",
  "region" => "us-east-1",
  "version" => "latest"
);

// S3 bucket
$clientS3 = new Aws\S3\S3Client($ops);
$clientS3->registerStreamWrapper();

$google_key = file_get_contents('s3://ach2077-ep-web/google-api-key.txt');
$sptrans_key = file_get_contents('s3://ach2077-ep-web/sptrans-api-key.txt');

?>
