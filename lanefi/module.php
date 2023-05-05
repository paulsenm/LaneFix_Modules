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
    //process form, do includes, etc
}

function routes(){
   return array(
        "" => __NAMESPACE__ . "\welcome",
        "/" => __NAMESPACE__ . "\welcome",
        "diagnostic" => __NAMESPACE__ . "\welcome",
        "send" => __NAMESPACE__ . "\send"
    );
}