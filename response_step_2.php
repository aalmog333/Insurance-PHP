<?php

if (isset($_POST['submit'])) {

    if (isset($_POST['c_id']) && is_numeric($_POST['c_id'])) {

        if (isset($_POST['phone']) && is_numeric($_POST['phone'])) {

            $c_id = gettype($_POST['c_id']);
            $phone = gettype($_POST['phone']);
            $guid = $_POST['guid'];

            echo '<br>' . $c_id;
            echo '<br>' . $phone;
            echo '<br>' . $guid;

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

// Setting the HTTP Request Headers
            $User_Agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17';

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
echo $response_body; // if code had sent to the phone the value will be 2 //TODO: check when the value isn't 2 (like if we enter wrong id or number)

            if (curl_errno($ch)) { // check for execution errors
                echo 'Scraper error: ' . curl_error($ch);
                exit;
            }

//if(!curl_exec($ch)){
//    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
//}
        }
    }
}
?>
