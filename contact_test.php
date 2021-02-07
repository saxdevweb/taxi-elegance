<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once './PHPMailer/PHPMailer.php';
require_once './PHPMailer/Exception.php';
require_once './PHPMailer/SMTP.php';
require_once './PHPMailer/PHPMailerAutoload.php';
require 'vendor/autoload.php';

try {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $date = $_POST['Date'];
  $heureArrivee = $_POST['heure-arrivee'];
  $message = $_POST['message'];

  if (isset($_POST['email'])) {
    //function sendEmail($to, $subject, $body, $headers)
    // {

    $to = "admin@taxi-elegance.fr";
    $email = "admin@taxi-elegance.fr"; //$_POST['email'];
    $subject = "Reservation taxi en ligne de : " . $name;

    // SMTP CONFIG
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->HOST = 'mail.gandi.net';
    $mail->SMTPAuth = true;
    //$mail->SMTPSecure = "tls";
    $mail->Password = '5GQmR2Fj*#NVF7';
    $mail->Username = 'admin@taxi-elegance.tld';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //PHPMailer::ENCRYPTION_SMTPS; //
    $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
    $mail->Port = 587;

    //Recipients
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('saxdevweb@gmail.com', 'Joe User');
    $mail->addReplyTo($to, 'Service');
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $message;

    $mail->send();
    $msg = $name  . ' & ' . $email . " - " . $date . " - " . $heureArrivee . " - " . $message  . " - FIN";
  }
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jan 16 2021 09:33:02 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5fd3bdc9dfed267ad767fa79" data-wf-site="5fd3bdc9493de17d15516f53">

<head>
  <meta charset="utf-8">
  <title>Contact</title>
  <meta content="Contact" property="og:title">
  <meta content="Contact" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/taxi-mohamed.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
      }
    });
  </script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">
    ! function(o, c) {
      var n = c.documentElement,
        t = " w-mod-";
      n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
    }(window, document);
  </script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>

<body>
  <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="navigation w-nav">
    <div class="navigation-wrap">
      <a href="index.html" class="logo-link w-nav-brand"><img src="images/taxiElegance.png" width="108" alt="" class="logo-image"></a>
      <div class="menu">
        <nav role="navigation" class="navigation-items w-nav-menu">
          <a href="index.html" class="navigation-item w-nav-link">ACCUEIL</a>
          <a href="projects.html" class="navigation-item w-nav-link">RESERVER</a>
          <a href="contact.html" aria-current="page" class="navigation-item w-nav-link w--current">Contact</a>
        </nav>
        <div class="menu-button w-nav-button"><img src="images/menu-icon_1menu-icon.png" width="22" alt="" class="menu-icon"></div>
      </div>
      <a href="mailto:m.boulayountaxi@gmail.com?subject=R%C3%A9servation%20de%20Taxi%20par%20site" class="button cc-contact-us w-inline-block">
        <div>Contacter nous</div>
      </a>
    </div>
  </div>
  <div class="section">
    <div class="intro-header cc-subpage">
      <div class="intro-content">
        <div class="heading-jumbo">NOUS CONTACTER<br>Message Email<br></div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="w-layout-grid contact-form-grid">
        <div id="w-node-509be705858e-d767fa79" class="contact-form-wrap">
          <div class="contact-form-heading-wrap">
            <div>MESSAGE : <?php echo $msg; ?> </div>
            <h2 class="contact-heading">Contactez-nous</h2>
            <div class="paragraph-light">Assurez-vous de recevoir une confirmation pour votre prise en charge. Dans le cas où aucune confirmation ne vous a été envoyée par mail, SMS, ou appel, n’hésitez pas à nous contacter directement par téléphone.</div>
          </div>
          <h4 class="contact-heading-msg"></h4>
          <div class="contact-form w-form">

            <form method="post" id="sendEmail" name="sendTest" action="contact_test.php" class="get-in-touch-form">
              <label for="name">Name</label>
              <input type="text" class="text-field cc-contact-field w-input" maxlength="256" name="name" data-name="Name" placeholder="Enter your name" id="Name">
              <label for="Email-2">Email Address</label>
              <input type="email" class="text-field cc-contact-field w-input" maxlength="256" name="email" data-name="email" placeholder="Enter your email" id="email" required="">
              <div class="w-row">
                <div class="w-col w-col-6"><label>DATE DU TRANSPORT</label></div>
                <div class="w-col w-col-6"><input type="text" class="w-input" maxlength="256" name="Date" data-name="Date" placeholder="12/07/2020" id="Date" required=""></div>
              </div>
              <div class="w-row">
                <div class="w-col w-col-6"><label>HEURE DE PRISE EN CHARGE</label></div>
                <div class="w-col w-col-6"><input type="text" class="w-input" maxlength="256" name="heure-arrivee" data-name="heure arrivee" placeholder="14H30" id="heure-arrivee" required=""></div>
              </div>
              <label for="message">Message / INFORMATIONS COMPLEMENTAIRES</label>
              <textarea name="message" data-name="message" maxlength="5000" placeholder="Votre texte et informations de réservation" class="text-field cc-textarea cc-contact-field w-input"></textarea>
              <input id="submit" type="submit" value="Envoyer" data-wait="Please wait..." class="button w-button">
            </form>

            <div class="status-message cc-success-message w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="status-message cc-error-message w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
        </div>
        <div id="w-node-509be70585a6-d767fa79">
          <div class="details-wrap">
            <div class="label">NOTRE SOCIETE / SERVICE</div>
          </div>
          <div class="paragraph-light">Nous nous rendons disponibles 7 jours sur 7, 24 heures sur 24 afin de répondre à tous vos besoins via ce formulaire de réservation.<br>‍</div>
          <div class="details-wrap">
            <div class="label">NOS Horaires</div>
            <div class="paragraph-light">Jour : 7 Jours sur 7<br>Disponible : 06:00 à 00:00<br>Horaire : 6 AM - 00 PM</div>
          </div>
          <div class="details-wrap">
            <div class="label">CONTACT</div>
            <a href="mailto:m.boulayountaxi@gmail.com?subject=Reservation client Taxi!" class="contact-email-link">m.boulayountaxi@gmail.com</a>
            <div class="paragraph-light">+33 (781) 050 312<br><a href="tel:07.81.05.03.12">07.81.05.03.12</a><br></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container"></div>
  </div>
  <div class="section">
    <div class="container">
      <div class="footer-wrap">
        <div class="w-layout-grid grid">
          <div>Tel: </div>
          <div><a href="tel:07.81.05.03.12">07.81.05.03.12</a></div>
          <div id="w-node-cc51d00825dd-51e627e8">
            <a href="mailto:m.boulayountaxi@gmail.com" target="_blank">m.boulayountaxi@gmail.com</a>
          </div>
          <div id="w-node-8c77e0ab90d3-51e627e8">Contact E-mail: </div>
        </div>
        <a href="https://saxdevweb.com/" target="_blank" class="webflow-link w-inline-block"><img src="images/logoSiteSax.png" width="230" alt="" class="webflow-logo-tiny">
          <div class="paragraph-tiny"><span class="text-span">Créer par SaxDevWeb</span></div>
        </a>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5fd3bdc9493de17d15516f53" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>