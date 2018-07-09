<?php
$cookie = '/tmp/cookie.txt';
$url = 'http://api.olhovivo.sptrans.com.br/v2.1';

//echo $url . '/Login/Autenticar?token=' . $chave_api;

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url . '/Login/Autenticar?token=' . $sptrans_key);
curl_setopt ($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
$result = curl_exec ($ch);
curl_close ($ch);
echo "<hr>";

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url . '/Linha/Buscar?termosBusca=Pinheiros');
curl_setopt ($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
$result = curl_exec ($ch);
curl_close ($ch);
echo "<hr>";

exit;
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url . '/Posicao/Linha?codigoLinha=34414');
curl_setopt ($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
$result = curl_exec ($ch);
curl_close ($ch);
echo "<hr>";

$url = $url . "/Posicao/Linha?codigoLinha=34414";
$response = \Httpful\Request::get($url)
    ->expectsJson()
    ->withXTrivialHeader('Content-Length: 0')
    ->addOnCurlOption(CURLOPT_COOKIEJAR, $cookie)
    ->addOnCurlOption(CURLOPT_COOKIEFILE, $cookie)
    ->send();

print_r($response);
?>
