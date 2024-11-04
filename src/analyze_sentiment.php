<?php
require_once '../config.php';

/**
* Function to analyze sentiment of a given text using Google NLP API.
* @param string $text - The text content to analyze.
* @return array - The JSON response from the API as an associative array.
*/
function analyzeSentiment($text) {
$url = GOOGLE_ENDPOINT;

// Prepare the data to be sent to the API
$data = [
"document" => [
"type" => "PLAIN_TEXT",
"content" => $text
],
"encodingType" => "UTF8"
];

// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request and close cURL session
$response = curl_exec($ch);
curl_close($ch);

// Decode JSON response into an associative array and return it
return json_decode($response, true);
}
