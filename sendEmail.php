<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name']) && isset($_POST['email']) ){
    // Init Vars
    $to = "service@taxi-elegance.fr";
    $name = "nameUser"; //$_POST['name'];
    $email = "service@taxi-elegance.fr"; //$_POST['email'];
    $message = "Message ..."; //$_POST['message'];
    $subject = "Reservation taxi en ligne de : " + $name;
    $body = $_POST['body'];

    require_once 'PHPMailer/PHPMailer.php';
    require_once 'PHPMailer/SMTP.php';
    require_once 'PHPMailer/Exception.php';

    $mail = new PHPMailer();

    // SMTP CONFIG
    $mail->isSMTP();
    $mail->HOST = 'mail.gandi.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'service@taxi-elegance.fr';
    $mail->Password = 'm.boulayountaxi@gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    // Mail sending 
    $mail->isHTML(true);
    $mail->MsgHTML(file_get_contents('contents.html'));
    $mail->AddAttachment('images/phpmailer_mini.gif');

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('joe@example.net', 'Mohamed');     // Add a recipient
    $mail->addReplyTo($to, 'Service');
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    $mail($to,$subject,$body,$headers);
    $mail->send();

    echo 'Message has been sent';
    // Validation sending mail...
    if ($mail->send()) {
        $status = "success";
        $response = "Email is send !";
    } else {
        $status = "failed";
        $response = "Une erreur s'est produit lors. Contacter nous directement! <br> " . $mail->ErrorInfo;
    }
    
    exit(json_encode(array("status" => $status, "response" => $response )));
}

?>