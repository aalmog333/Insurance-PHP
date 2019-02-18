<?php

if (isset($_POST['submit'])) {

    // needs to validate c_id in client side
    if (isset($_POST['code']) && is_numeric($_POST['code'])) {

            $code = $_POST['code'];

            echo '<br>' . $code;
            echo '<br><br>';

            $response = request_2($code);
            echo $response;
            echo '<br>';

    }
}

// post request // with variables
function request_2($code)
{

    // setting url
    $url = "http://localhost:3000/request2";

    // setting data
    $data = array(
        "code" => $code
    );
    $data_string = json_encode($data);

    // Performing the HTTP request
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    $response = curl_exec($ch); // Performs the Request, with specified curl_setopt() options (if any).
    curl_close($ch);

    return $response;
}
