<?php
$base_url = 'https://breakpoverty2015.firebaseio.com/';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $base_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, $base_url);
curl_setopt($curl, CURLOPT_HEADER, $base_url);

$output = curl_exec($curl);
curl_close($curl);

echo $output;
?>
