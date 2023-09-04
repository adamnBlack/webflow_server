
<?php

// Get JSON data from frontend website
//$data = $_POST['requestData'];
$jsonData = file_get_contents('php://input');
echo $jsonData;

$data = json_decode($jsonData, true);

// Convert data to form-urlencoded
 $formData = http_build_query($data);

echo $formData;

// Set URL to send data to
$url = 'https://bnxapi.com/api/v2/leads';

// Create an array of headers
$headers = array(
    'Api-Key: CB133839-B06C-4999-0F3A-1AA1F9BA67D2', // Example header with authorization
    'Content-Type: application/x-www-form-urlencoded' // Example header
);

// Set cURL options
$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $formData,
   // CURLOPT_POSTFIELDS => $jsonData,
    CURLOPT_HTTPHEADER => $headers // Set the headers
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt_array($ch, $options);

// Execute cURL session
 $response = curl_exec($ch);

// Close cURL session
 curl_close($ch);

echo $response
?>
