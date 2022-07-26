<?php
$page = "location"; 
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

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'qrayafclick@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Formation@123'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom("$email"); // Gmail address which you used as SMTP server
    $mail->addAddress('qrayafclick@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message recu (page de location)';
    $mail->Body = "<h3>nom : $name <br>prenom :$prenom <br>email: $email <br>Message :$message </h3>";

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
                        <h2>NOS CENTRES</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Acceuil</a>
                        <a href="location.php">Centres</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-header text-left">
                            <p>POSTES DE REPARATION</p>
                            <h2>NOS CENTRES MPE</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>MPE , TANGER</h3>
                                        <p>Av. Ahmed Balafrej, Tanger</p>
                                        <p><strong>Tél:</strong>(+ 212) 5 58 63 60 78</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>MPE, RABAT</h3>
                                        <p>AV. Mohammed V, Rabat</p>
                                        <p><strong>Tél:</strong>(+ 212) 5 58 99 30 30</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>MPE, CASABLANCA</h3>
                                        <p>Quartier Beausite, Voie AS-31, Casablanca</p>
                                        <p><strong>Tél:</strong>(+ 212) 5 20 21 60 78</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>MPE, MARRAKECH</h3>
                                        <p>Croisement route Targa et Boulevard Laâyoune, Marrakech</p>
                                        <p><strong>Tél:</strong>(+ 212) 5 58 99 60 99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="location-form">
                            <h3>Prendre un rendez-vous</h3>
                            <form action="location.php" method="post">
                                <?php echo $alert; ?>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="fname" name="name" placeholder="Entrer Votre Nom" required="required" data-validation-required-message="S'il vous plaît entrez votre nom" />
                                </div>
                                <div class="control-group">
                                <input type="text" class="form-control" id="lname" name="prenom" placeholder="Entrer Votre Prenom" required="required" data-validation-required-message="S'il vous plaît entrez votre prenom" />
                                </div>
                                <div class="control-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Entrer Votre E-mail" required="required" data-validation-required-message="S'il vous plaît entrez votre email" />
                                </div>
                                <div class="control-group">
                                <textarea class="form-control" type="message" id="message" name="message" placeholder="message" required="required" data-validation-required-message="S'il vous plaît entrez votre message"></textarea>
                                </div>
                                <div>
                                <button class="btn btn-custom" type="submit" name="submit" value="Envoyer" id="sendMessageButton">Envoyer Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->        
        
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
