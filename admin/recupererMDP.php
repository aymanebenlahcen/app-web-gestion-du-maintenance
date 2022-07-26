<?php 
require 'phpmailer/SMTP.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'cnxpdo.php';
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start(); 
$mail = new PHPMailer(true);

$alert = '';
$alertEr='';

if(isset($_POST['submit'])){
  $email = $_POST['email'];
      $query = "SELECT * FROM admin where email='$email'";
      $stmt = $cnx->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count>0){
        
          $number=rand(0,10000);
          $_SESSION['number']=$number;    //session de Nombre 
          $_SESSION['EmailR']=$email;
          try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'qrayafclick@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'xxfymzugigwugxwa'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom("$email"); // Gmail address which you used as SMTP server
    $mail->addAddress("$email"); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Recuperation de mot de passe ';
    $mail->Body = "<h3> QRAYA LIK </h3> <h3>Mot de passe  : $number </h3>";

    $mail->send();
    $alert = '<div style="    z-index: 8;
    background: #d4edda;
    font-size: 18px;
    padding: 20px 40px;
    min-width: 420px;
    position: fixed;
    right: 0;
    top: 10px;
    border-left: 8px solid #51be78;
    border-radius: 4px;" class="alert-success">
                 <span>Message envoyé!</span>
                 <a href="Verification.php">Verification</a>
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
    border-left: 8px solid #FFA502;
    border-radius: 4px;"  class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
              
  }

      }else{
        $alertEr="<div class='alert alert-danger'>Ce email non existe</div>";
      }
 

  
}
?>

<!DOCTYPE html>
<html lang="fr">

<head >
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Mot de passe Oubliée</title>
    <link href="img/logo1.png" rel="icon">
        <link rel="shortcut icon" type="image/x-icon" href="img/logo1.png">
    <!-- Fontfaces CSS-->
    <link href="css1/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css1/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition tele">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="http://127.0.0.1/gestion_main/">
                                <img src="img/logo1.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                        <h2 class="tele2" >Recuperer votre mot de passe </h2>
                         <form action="RecupererMDP.php" method="post">
                            <?php echo "$alert"; ?>

                            <div class="container tele1">
                            <div class="form-group">
                                <?php echo  $alertEr; ?>
                            </div>
                            <div class="form-group">
                                <label for="fname">Email</label>
                                <input class="au-input au-input--full" type="text" id="fname" name="email" placeholder="Saisir Votre E-mail" required>
                            </div>
                            <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit" name="submit" value="Envoyer" >submit</button>

                    </div>
    </form>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->