<?php

// setting same user agent for all requests
$User_Agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';

if (isset($_POST['submit'])) {

    // needs to validate c_id in client side
    if (isset($_POST['c_id']) && is_numeric($_POST['c_id'])) {
        // needs to validate phone in client side
        if (isset($_POST['phone']) && is_numeric($_POST['phone'])) {

            $c_id = $_POST['c_id'];
            $phone = $_POST['phone'];
            $guid = $_POST['guid'];

            echo '<br>' . $c_id;
            echo '<br>' . $phone;
            echo '<br>' . $guid;
            echo '<br><br>';

            $cookies_1 = request_1($c_id, $phone, $guid);
//            var_dump($cookies_1); 
            echo '<br>';
            $html = request_2();
            $cookies_3 = request_3();
            echo $cookies_3 . '<br>';

//            $cookies = array_merge($cookies_1, $cookies_3);
            echo json_encode($cookies);
            echo '<br><br><br><br>';
            echo $html;
        }
    }
}

// post request // with variables 
function request_1($c_id, $phone, $guid) {

    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/Umbraco/surface/LoginOTP/CheckIdentity";

    // setting data
    $data = array(
        "CID" => "",
        "Identity" => $c_id,
        "RoleId" => 1,
        "guid" => $guid,
        "isWithdrawal8000" => 0,
        "phoneNum" => $phone
    );
    $data_string = json_encode($data);

    // Performing the HTTP request
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    // get headers too with this line
//    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
    curl_close($ch);

//    if (curl_errno($ch)) { // check for execution errors
//        echo 'Scraper error: ' . curl_error($ch);
//        exit;
//    }
//
//    list($header, $body) = explode("\r\n\r\n", $response, 2);
//
//    $cookies = extract_cookies_from_header($header);

    echo '<br>bla bla -     - bla bla<br>';
    var_dump($response);
    echo '<br>bla bla -     - bla bla<br>';

    return $response;
}

// get request
function request_2() {

    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/loginOTP/app/pages/loginCode/login-code.html";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // get headers too with this line
//    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
//    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
//    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
    curl_close($ch);

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

//    $cookies = extract_cookies_from_header($response);
//    return $cookies;
    return $response;
}

// post request // with variable
function request_3() {

    global $User_Agent;

    // URL to fetch
    $url = "https://customers.meitavdash.co.il/umbraco/surface/LoginOTPContent/GetOtpContent";

    // setting data
    $data = array("aliasPrefix" => "step_2_");
    $data_string = json_encode($data);


    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Warning: This makes the request absolute insecure (only for testing) - see ref -> https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/cookies.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_USERAGENT, $User_Agent);

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
    curl_close($ch);

    if (curl_errno($ch)) { // check for execution errors
        echo 'Scraper error: ' . curl_error($ch);
        exit;
    }

    $cookies = extract_cookies_from_header($response);

    return $cookies;
}

function extract_cookies_from_header($header) {

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $header, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    return $cookies;
}
