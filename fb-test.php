<?php
//curl -X PUT -d '{ "alanisawesome": { "name": "Alan Turing", "birthday": "June 23, 1912" } }' 'https://docs-examples.firebaseio.com/rest/quickstart/users.json'


$base_url = 'https://burning-heat-7302.firebaseio.com/';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $base_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, $base_url);
curl_setopt($curl, CURLOPT_HEADER, $base_url);

$output = curl_exec($curl);
curl_close($curl);

echo $output;
?>
