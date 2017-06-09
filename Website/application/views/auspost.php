<?php
//get post data. urlencode the postcode data incase someone enters a suburb name with spaces.
$postcode = urlencode($_POST['postcode']);
//your Auspost API
$apiKey = 'ce5188fc-09ee-4b5a-9b43-93e9c2ca4521';
// Set the URL for the Postcode search
$urlPrefix = 'auspost.com.au';
$parcelTypesURL = 'http://' . $urlPrefix . '/api/postcode/search.json?q='.$postcode.'&excludePostBoxFlag=true';
// Lookup postcode
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $parcelTypesURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('AUTH-KEY: ' . $apiKey));
$rawBody = curl_exec($ch);
// Check the response: if the body is empty then an error occurred
if(!$rawBody){
die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
} else {
print_r($rawBody);
}
?>