
<?php

include_once('header.php');
require_once ('../vendor/autoload.php');

$reponse="";
$debug=true;

use Dotenv\Store\File\Paths;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['mail'])){
    extract($_POST);
    if(!empty($subject) AND !empty($from) AND !empty($message)){
    
    $from=$_POST['from'];
    $subject=$_POST['subject'];
    $content=$_POST['message'];

    require '../vendor/autoload.php';
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/../');;
    $dotenv->load();
    // Configure SMTP
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->Port = 587;
    $phpmailer->Username = 'sebastienescorne@gmail.com';
    $phpmailer->Password = getenv('PASSWORD_MAIL');
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
  // Mail Headers
    $phpmailer->setFrom("sebastienescorne@gmail.com", "sebastienescorne@gmail.com");
    // Change to recipient email. Make sure to use a real email address in your tests to avoid hard bounces and protect your reputation as a sender.
    $phpmailer->addAddress($from, $from);
    $phpmailer->isHTML(true);
    // Message
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $content;
  
    
    // Send the Email
    try{
        $phpmailer->send();
        $reponse = "Message bien envoyé";

    }catch(Exception $e){
        echo "Mailer Error:" .$e->getMessage();
    }
} else{
    $reponse = "Remplissez tous les champs SVP !!!";
    }

};
?>

<div class="img_fond_zoo text-center text-white">
    <div class="img_fond_zoo_content">
        <h1>Contact </h1>
    </div>
</div>
<div class="centrea">
<div class="container mb-3">
<form method="POST" action="">
        <div class="row justify-content-center">
        <div class="col-8 mb-1">
                <label for="subject" class="form-label">Sujet:</label>
                <input type="text" class="form-control" name="subject">
        </div>
    </div>
  
    <div class="row justify-content-center">
        <div class="col-8 mb-1">
                <label for="message" class="form-label">Votre message:</label>
                <textarea class="form-control" name="message" rows="5"></textarea>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8 mb-1">
                <label for="from" class="form-label">Votre e-mail:</label>
                <input type="email" class="form-control" name="from" placeholder="name@example.com">
        </div>
    </div>
  
    <div class="text-center mt-3">
      <button  type="submit" name="mail" class="btn btn-primary text-dark">Envoyer</button>
      <a class="btn btn-primary text-dark" href="./home.php">Retour</a>
      <div style='color:red' class='text-center mt-2'><?= $reponse ?> </div>
    </div>
  </form>
</div>
</div>

<?php
include_once('footer.php');
?>





  