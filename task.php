<?php

// API details
$apiServer = 'https://api.demo.sitehost.co.nz';
$apiVersion = '1.0';
$apiKey = 'd17261d51ff7046b760bd95b4ce781ac';
$clientId = '293785';

// API endpoint
$apiUrl = "{$apiServer}/{$apiVersion}/srs/list_domains.json?client_id={$clientId}&apikey={$apiKey}";

// Fetch data from API
$response = file_get_contents($apiUrl);

// Check if the response is valid
if ($response === false) {
    echo "Error fetching data from the API.";
} else {
    // Decode JSON response
    $data = json_decode($response, true);

    // Check if the response contains domains
    if (isset($data['domains'])) {
      
        echo "<h1>List of Domains for Customer #{$clientId}</h1>";
        echo "<ul>";
        foreach ($data['domains'] as $domain) {
            echo "<li>{$domain}</li>";
        }
        echo "</ul>";
    } else {
        echo "No domains found for Customer #{$clientId}.";
    }
}

?>