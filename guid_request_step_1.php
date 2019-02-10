<?php

// test - google 
// $url = "http://www.google.com/search?q="."dog"."&hl=en&start=0&sa=N";
//  $ch = curl_init();
//  curl_setopt($ch, CURLOPT_HEADER, 0);
//  curl_setopt($ch, CURLOPT_VERBOSE, 0);
//  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
//  curl_setopt($ch, CURLOPT_URL, $url);
//  $response = curl_exec($ch);
//  curl_close($ch);
//  echo $response;
  
  
// URL to fetch
$url = "https://customers.meitavdash.co.il/Umbraco/surface/LoginOTP/PageLoad";

// setting data
//$data = array("IsByUser" => "", "token" => "");                                                                    
//$data_string = json_encode($data);

// Setting the HTTP Request Headers
$User_Agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';

//$request_headers = array();
//$request_headers[] = 'Accept: application/json, text/plain, */*';
//$request_headers[] = 'Connection: keep-alive';
//$request_headers[] = 'Content-Length: 26';
//$request_headers[] = 'Content-Type: application/json;charset=UTF-8';
//$request_headers[] = 'Host: customers.meitavdash.co.il';
//$request_headers[] = 'Origin: https://customers.meitavdash.co.il';
//$request_headers[] = 'Referer: https://customers.meitavdash.co.il/home/loginuse';
//$request_headers[] = 'User-Agent: '. $User_Agent;

//phpinfo();

// Performing the HTTP request
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, TRUE);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
//curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'IsByUser=""&token=""'); 
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');

//$info = curl_getinfo($ch);
//echo json_encode($info);

$response_body = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
////echo 'Curl error: ' . curl_error($ch);
//curl_close($ch);
//
//echo $response_body;

if(curl_errno($ch)) // check for execution errors
{
	echo 'Scraper error: ' . curl_error($ch);
	exit;
}

//if(!curl_exec($ch)){
//    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
//}