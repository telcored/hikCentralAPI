<?php

$url = "https://10.10.10.12/artemis/api/common/v1/version"; // Cambia esta URL a la de tu API
$apiKey = "21152844";
$secretKey = "mGsdDKyR8c66xvIYMBqS";
$data = json_encode([]); // Si necesitas enviar un cuerpo de solicitud, ajusta este array

$stringToSign = "POST\n*/*\nx-ca-key:$apiKey\n/artemis/api/common/v1/version";
$signature = base64_encode(hash_hmac('sha256', $stringToSign, $secretKey, true));

$headers = [
    "x-ca-key: $apiKey",
    "x-ca-signature: $signature",
    'x-ca-signature-headers' => "x-ca-key",
    "Content-Type: application/json",
    "Accept: application/json",
    'Accept' => "*/*"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Si hay datos que enviar
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    echo "Respuesta de la API: " . $response;
}

curl_close($ch);

?>
