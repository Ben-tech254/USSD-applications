<?php
//Echo Response back to the API
header('Content-Type: text/plain');

//Read POST variables from the API
$sessionId = $_POST['sessionId'];
$networkCode =$_POST['networkCode'];
$serviceCode = $_POST['serviceCode'];
$phoneNumber = ltrim($_POST['phoneNumber']);
$text = $_POST['text'];

//Check if the text is empty so as to start a new session
if ($text == "") {
    //This is the first request. Note how we start the response with CON
    $response = "CON Welcome to the USSD demo service \n";
    $response .= "1. My Account \n";
    $response .= "2. My phone number";
} else if ($text == "1") {
    //Business logic for first level response
    $response = "CON Choose account information you want to view \n";
    $response .= "1. Account number \n";
    $response .= "2. Account balance";
} else if ($text == "2") {
    //Business logic for first level response
    //This is a terminal request. Note how we start the response with END
    $response = "END Your phone number is ".$phoneNumber;
} else if ($text == "1*1") {
    //Business logic for second level response
    //This is a terminal request. Note how we start the response with END
    $accountNumber  = "ACC1001";
    $response = "END Your account number is ".$accountNumber;
} else if ($text == "1*2") {
    //Business logic for second level response
    //This is a terminal request. Note how we start the response with END
    $balance  = "KES 10,000";
    $response = "END Your account balance is ".$balance;
} else {
    $response = "END Invalid input. Please try again.";
}