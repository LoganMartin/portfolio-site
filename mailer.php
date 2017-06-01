<?php
date_default_timezone_set('America/Los_Angeles');
require 'PHPMailer/PHPMailerAutoload.php';
require 'config.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'sendMessage':     sendMessageToEmail();   break;
        default:                                        break;
    }
}

/**
*
*
*/
function sendMessageToEmail() {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $mail = new PHPMailer;
    $emailConfig = getConfigSection("email");

    $validity = validateMessage($name, $email, $message);

    if($validity != "valid") {
        die($validity);
    }

    $mail->isSMTP();
    //$mail->SMTPDebug = 2;
    //$mail->Debugoutput = 'html';
    $mail->Host = 'mail.loganrmartin.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    //$mail->AuthType = "PLAIN";
    $mail->Username = $emailConfig["username"];
    $mail->Password = $emailConfig['pass'];

    //Workaround for the PHP 5.6 certification changes, breaks login using
    //sub4.mail.dreamhost.com host domain.
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    //die(date('r'));
    //die("Creds: ".$mail->Username." : ".$mail->Password);
    $mail->setFrom('webform@loganrmartin.com', 'Portfolio Site!');
    $mail->addAddress('contact@loganrmartin.com');

    $mail->Subject = "[Portfolio Site] New Message From: ".$name;
    $mail->Body    = "Return Address: ".$email."\n\nMessage: \n\n".$message;

    if(!$mail->send()) {
        echo "Mailer Error: ".$mail->ErrorInfo;
    }
    else {
        echo "success";
    }
}

// A quick check to make sure the message is valid before sending it off.
function validateMessage($name, $email, $message) {
    if($name == "") {
        return "Please enter a name!";
    }
    if($email == "" || strpos($email, '@') === false) {
        return "Please enter a valid Email address!";
    }
    if($message == "") {
        return "Please leave a message!";
    }
    return "valid";
}
?>
