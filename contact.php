<?php
$page = "contact"; 
require 'phpmailer/SMTP.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
 
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'qrayafclick@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'xxfymzugigwugxwa'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom("$email"); // Gmail address which you used as SMTP server
    $mail->addAddress('qrayafclick@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message recu (page de contact)';
    $mail->Body = "<h3>nom : $name <br>prenom :$prenom <br>email: $email <br>subject : $subject <br>Message :$message </h3>";

    $mail->send();
    $alert = '<div style="    z-index: 8;
    background: #d4edda;
    font-size: 18px;
    padding: 20px 40px;
    min-width: 420px;
    position: fixed;
    right: 0;
    top: 10px;
    border-left: 8px solid #2f1396;
    border-radius: 4px;" class="alert-success">
                 <span>Message envoyé! Merci de nous contacter.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div style="    z-index: 8;
    background: #FFF3CD;
    font-size: 18px;
    padding: 20px 40px;
    min-width: 420px;
    position: fixed;
    right: 0;
    top: 10px;
    border-left: 8px solid #ff0202;
    border-radius: 4px;"  class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>MPE motors Performance - Développement de cartographie moteur</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/logo.png" rel="icon">
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    <?php include 'header.php'; ?>   
    <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>CONTACTS</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Acceuil</a>
                        <a href="service.php">Contacts</a>
                    </div>
                </div>
            </div>
    </div> 
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>ENTRER EN CONTACT</p>
                    <h2>Contact pour toute question</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h2>Coordonnées rapides</h2>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Heure d'ouverture</h3>
                                    <p>Lundi - Vendredi, 9:00-18:00</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Appelez-nous</h3>
                                    <p>Tél: (+ 212) 6 58 99 60 78</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Email Us</h3>
                                    <p>Email: mpe.contact@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form action="contact.php" method="post">
                                <?php echo $alert; ?>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="fname" name="name" placeholder="Entrer Votre Nom" required="required" data-validation-required-message="S'il vous plaît entrez votre nom" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="lname" name="prenom" placeholder="Entrer Votre Prenom" required="required" data-validation-required-message="S'il vous plaît entrez votre prenom" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrer Votre E-mail" required="required" data-validation-required-message="S'il vous plaît entrez votre email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required="required" data-validation-required-message="S'il vous plaît entrez votre subject" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" id="message" name="message" placeholder="message" required="required" data-validation-required-message="S'il vous plaît entrez votre message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit" name="submit" value="Envoyer" id="sendMessageButton">Envoyer Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1600663868074!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <?php include 'footer.php'; ?>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
                        </html>
