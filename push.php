<?php
ini_set("display_errors",1);
print_r($_POST);
$apiKey = "AIzaSyC18XaYfFW3zgDVuX01PzpY_hN24jUAz7E";


// Replace with real client registration IDs 
$registrationIDs = $_POST['regid'];
// Message to be sent
$message = "there is an update, waiting for you to install...";
// Set POST variables
$url = 'https://android.googleapis.com/gcm/send';

$fields = array(
            'registration_ids'  => $registrationIDs,
            'data'              => array( "message" => $message ),
            );

$headers = array( 
                'Authorization: key=' . $apiKey,
                'Content-Type: application/json'
            );

// Open connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
echo "1";
curl_setopt( $ch, CURLOPT_POST, true );
echo "2";
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
echo "3";
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
echo "4";
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
echo "5";
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0); 
echo "6";
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($fields) );
echo "7";
$result = curl_exec($ch);
if(curl_errno($ch)){ echo 'Curl error: ' . curl_error($ch); }
curl_close($ch);
echo $result;



?>
