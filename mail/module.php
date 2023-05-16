<?php

namespace mail;

function mailTest(){
    if (isset($_POST)){
        $data = file_get_contents("php://input");
        $params = json_decode($data, true);
        $body = $params["body"];
        $recipient = $params["recipient"];
        $subject = $params["subject"];

        $status = sendMail($recipient, $subject, $body);
        print $status;
    }
    else {
        echo "Was not set";
        echo "Post array size was: " . sizeof($_POST);
    }
}

function routes(){
    return array(
         "email" => __NAMESPACE__ . "\mailTest"
     );
 }