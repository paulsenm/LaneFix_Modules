<?php
//Get env variables:
require_once BASE_DIR . '/includes/envSetup.php';
//Get email information from .env
$env_php_mailer_sender_address = $_ENV['PHP_MAILER_SENDER_ADDRESS'];
$env_php_mailer_recipient_address = $_ENV['PHP_MAILER_RECIPIENT_ADDRESS'];
$env_php_mailer_password = $_ENV['PHP_MAILER_PASSWORD'];



$custName = $_POST['CUST_NAME'];
$custInfo = $_POST['CUST_INFO'];
//$contactTime = $_POST['CONTACT_TIME'];
$netDown = $_POST['NET_DOWN'];
$lightsOn = $_POST['LIGHTS_ON'];
$powerGood = $_POST['POWER_GOOD'];
$powerCycled = $_POST['POWER_CYCLED'];
$newIssue = $_POST['NEW_ISSUE'];
$issueTime = $_POST['ISSUE_DURATION'];
$wifiIcon = $_POST['WIFI_ICON'];
$discUISP = $_POST['DISC_UISP'];
$networkThreadStarted = $_POST['NETWORK_THREAD_STARTED'];
$photoSent = $_POST['PHOTO_SENT'];
$wirelessOrFiber = $_POST['WIRELESS_OR_FIBER'];
$speedTested = $_POST['SPEED_TESTED'];
$speedResult = $_POST['SPEED_RESULT'];
$whichDevices = $_POST['WHICH_DEVICES'];
$meshNetwork = $_POST['MESH_NETWORK'];
//$notesInput = $_POST['NOTES_INPUT'];
$subject = $_POST['CUST_INFO']." Member Network Issue";
function toWard($inputChar){

}
$message = "
  <p>Customer Name: ". $custName ."</p>
  <p>Customer Info: ". $custInfo . "</p>
  <p>Network Down: ". $netDown . "</p>
  <p>Lights On: ". $lightsOn . "</p>
  <p>Power Good: ". $powerGood . "</p>
  <p>Power cycled: ". $powerCycled . "</p>
  <p>New issue: ". $newIssue . "</p>
  <p>Issue duration ". $issueTime . "</p>
  <p>Wifi icon present: ". $wifiIcon . "</p>
  <p>UISP disconnection: ". $discUISP . "</p>
  <p>Network thread started: ". $networkThreadStarted . "</p>
  <p>Photo sent: ". $photoSent . "</p>
  <p>Wireless or Fiber: ". $wirelessOrFiber . "</p>
  <p>Speed tested: ". $speedTested . "</p>
  <p>Internet speed: ". $speedResult . "</p>
  <p>Devices affected: ". $whichDevices . "</p>
  <p>Mesh network in use: ". $meshNetwork . "</p>
  ";
//<p>Time of contact: ". $contactTime . "</p>
//<p>Notes: ". $notesInput . "</p>
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require 'PHPMailer-master/src/Exception.php';
// require 'PHPMailer-master/src/PHPMailer.php';
// require 'PHPMailer-master/src/SMTP.php';

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Mailer     = "smtp";
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = TRUE;                                   //Enable SMTP authentication
    $mail->Username   = $env_php_mailer_sender_address;                     //SMTP username
    $mail->Password   = $env_php_mailer_password;                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($env_php_mailer_sender_address, 'Test Issue');
    $mail->addAddress($env_php_mailer_recipient_address);     //sends the message to this address


    //Attachments


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);
    $mail->MsgHTML($message);
    $mail->Send();
    echo "Message sent!";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 ?>
