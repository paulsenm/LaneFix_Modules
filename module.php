<?php
namespace LaneFi;

//throw new \Exception("module.php was included");

function welcome(){
    $welcomeText = "Welcome to the LaneFix Diagnostic App. This app is designed to guide customer service and technician employees through a troubleshooting call with a customer. When you begin, a dialog will appear with information that you will obtain from the customer. The app will then use this information to find the next question, or set of instructions. To begin, press the 'Get Started' button below. ";
    if (php_sapi_name() === 'cli'){
        print $welcomeText;
    }
    else {

        include BASE_DIR . '/templates/diagnostic.tpl.php';
    }
}

function send(){
    require  BASE_DIR . '/includes/testQuestions.php';
    $json = json_decode($questions, true);
    
    $questionsFile = file_get_contents( BASE_DIR . '/cache.autoQuestions.json');
    $questionsArray = json_decode( $questionsFile, true);
    $lines = [];
    foreach($_POST as $k => $answer){
        $q = $questionsArray[$k];
        $label = $q["formQuestion"];
        $lines[$label] =$label . $answer;
    }
    $body = implode('<br />', $lines);
    echo $lines[0];
    // $sender = $_ENV['PHP_MAILER_SENDER_ADDRESS'];
    $recipient = $_ENV['PHP_MAILER_RECIPIENT_ADDRESS'];
    // $password = $_ENV['PHP_MAILER_PASSWORD'];

    $status = sendMail($recipient, $subject, $body);
    print $status;
}



function routes(){
   return array(
        "" => __NAMESPACE__ . "\welcome",
        "/" => __NAMESPACE__ . "\welcome",
        "diagnostic" => __NAMESPACE__ . "\welcome",
        "send" => __NAMESPACE__ . "\send"
    );
}