<?php

// empty old cookies from file
file_put_contents(dirname(__FILE__) . '/tmp/cookies.txt', "");

// setting same user agent for all requests
$User_Agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';

$cookies_1 = get_login_cookies_1();
$cookies_2 = get_login_cookies_2();
$cookies = array_merge($cookies_1,$cookies_2);
echo json_encode($cookies);
dd();
$guid = get_guid();

function get_login_cookies_1() {
  
// URL to fetch
$url = "https://customers.meitavdash.co.il/home/loginuser";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// get headers too with this line
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

$response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
curl_close($ch);

// get cookie
// multi-cookie variant contributed by @Combuster in comments
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}

if(curl_errno($ch)) // check for execution errors
{
	echo 'Scraper error: ' . curl_error($ch);
	exit;
} 

return $cookies;

}

function get_login_cookies_2() {
  
// URL to fetch
$url = "https://customers.meitavdash.co.il/Umbraco/surface/LoginOTP/EmployersOrAgents";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// get headers too with this line
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

$response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
curl_close($ch);

// get cookie
// multi-cookie variant contributed by @Combuster in comments
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}

if(curl_errno($ch)) // check for execution errors
{
	echo 'Scraper error: ' . curl_error($ch);
	exit;
} 

return $cookies;

}

function get_guid() {
    
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
$data = array("IsByUser" => "", "token" => "");                                                                    
$data_string = json_encode($data);

// Setting the HTTP Request Headers
// 
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
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);
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

return $response_body;

//if(!curl_exec($ch)){
//    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
//} 
}
