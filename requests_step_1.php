<?php

// clear old cookies from file
file_put_contents(dirname(__FILE__) . '/tmp/cookies.txt', "");

// setting same user agent for all requests
$User_Agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';

$cookies_1 = request_1();
$cookies_2 = request_2();
$cookies_3 = request_3();
$cookies_4 = request_4();
$cookies_5 = request_5();
$array = request_6();
$cookies_6 = $array[0];
$guid = $array[1];
$cookies = array_merge($cookies_1, $cookies_2, $cookies_3, $cookies_4, $cookies_5, $cookies_6);
//echo json_encode($cookies);
//dd();

// get request
function request_1()
{
    global $User_Agent;

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

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $cookies = extract_cookies_from_header($response);

    return $cookies;
}

// post request
function request_2()
{
    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/Umbraco/surface/LoginOTP/EmployersOrAgents";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $cookies = extract_cookies_from_header($response);

    return $cookies;
}

// post request // with variable
function request_3()
{
    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/umbraco/surface/LoginOTPContent/GetOtpContent";

    // setting data
    $data = array("aliasPrefix" => "step_1_");
    $data_string = json_encode($data);


    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $cookies = extract_cookies_from_header($response);

    return $cookies;
}

// post request
function request_4()
{
    global $User_Agent;
    // URL to fetch
    $url = "https://customers.meitavdash.co.il/Umbraco/surface/LoginOTP/isGemelInvest";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $cookies = extract_cookies_from_header($response);

    return $cookies;
}

// get request
function request_5()
{
    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/umbraco/surface/LoginOTPContent/GetMarketingSiteURL";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $cookies = extract_cookies_from_header($response);

    return $cookies;
}

// post request // with variables
function request_6()
{
    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/Umbraco/surface/LoginOTP/PageLoad";

    // setting data
    $data = array("IsByUser" => "", "token" => "");
    $data_string = json_encode($data);

    // Performing the HTTP request
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    list($header, $body) = explode("\r\n\r\n", $response, 2);

    $cookies = extract_cookies_from_header($header);
    $guid = $body;

    return array($cookies, $guid);
}

function extract_cookies_from_header($header)
{
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $header, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    return $cookies;
}
