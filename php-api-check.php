
<?php

$apiKey = 'Ln01FLvVb+jU9RbBpS+MPebyaRsH2gos';
$secretKey = 'LJKYP3AjGEGMd/BaOoD9zsT3gx5DLvXIj81fnAHYOt89VSJjyPGlQFiSOwcbghSV';

$timestamp = (string)(time() * 1000);
$method = 'GET';
$endPoint = 'https://forex-api.coin.z.com/private';
$path = '/v1/positionSummary';

$text = $timestamp . $method . $path;
$sign = hash_hmac('sha256', $text, $secretKey);

$parameters = [
    "symbol" => "MXN_JPY"  // 指定しない場合は全銘柄
];

$headers = [
    "API-KEY: $apiKey",
    "API-TIMESTAMP: $timestamp",
    "API-SIGN: $sign"
];

$url = $endPoint . $path . '?' . http_build_query($parameters);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);
    echo json_encode($result, JSON_PRETTY_PRINT);
}

curl_close($ch);
