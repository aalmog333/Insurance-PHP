<?php

if (isset($_POST['submit'])) {

    // needs to validate c_id in client side
    if (isset($_POST['c_id']) && is_numeric($_POST['c_id'])) {
        // needs to validate phone in client side
        if (isset($_POST['phone']) && is_numeric($_POST['phone'])) {
            $c_id = $_POST['c_id'];
            $phone = $_POST['phone'];

            echo '<br>' . $c_id;
            echo '<br>' . $phone;
            echo '<br><br>';

            $response = request_1($c_id, $phone);
            echo $response;
            echo '<br>';

        }
    }
}

// post request // with variables
function request_1($c_id, $phone)
{

    // setting url
    $url = "http://localhost:3000/request1";

    // setting data
    $data = array(
        "id" => $c_id,
        "phone" => $phone
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
