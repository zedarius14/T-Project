<?php
session_start();

function log_to_file($message){
    $logFile = 'paypal.log';
    file_put_contents($logFile, date('Y-m-d H:i:s') . '-' . $message . PHP_EOL, FILE_APPEND);
} 

// Client credentials
$clientId = 'AdrNa5-6xouZlkhm_-jQeTgtmpIP42o1p7x43OmyMXgYHpyzuu1rkviw8pC_v6TAEqHJbTHTqS8mT1lc';
$secret = 'EIj9lOQNtfffCQ6ui9Cw6De9WUT_WcTGKHy2QnBCCm9AWvx1BSB8ptxoDqzJuwR6oe5_4n6v7RV3gqAU';
$baseUrl = "https://api-m.sandbox.paypal.com"; // Use https://api-m.paypal.com for live

// Retrieve access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$baseUrl/v1/oauth2/token");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$result = curl_exec($ch);
if (empty($result)) die("Error: No response.");
else {
    $json = json_decode($result);
    $accessToken = $json->access_token;
}
curl_close($ch);

// Retrieve order total price
$request = file_get_contents("php://input");
$requestJson = json_decode($request);
$amount = isset($requestJson->order_total_price) ? $requestJson->order_total_price : '0.00';

// Create the order
$order = [
    "intent" => "CAPTURE",
    "purchase_units" => [[
        "amount" => [
            "currency_code" => "USD",
            "value" => "$amount"
        ]
    ]]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$baseUrl/v2/checkout/orders");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $accessToken"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$order = json_decode($response);
echo json_encode($order);
?>
