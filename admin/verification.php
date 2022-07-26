<?php require 'cnxpdo.php';
session_start();
$alert="";
$a=0;
 $number=$_SESSION['number'];
 if(isset($_POST['submit'])){
   $number1=$_POST['number'];
   if($number1!=$number){
     $alert="<div class='alert alert-danger'>Numero de verification incorrect</div>";
                }else{
                  $a=1;
                }
 }
 if(isset($_POST['modifier'])){
  $mdp=$_POST['mdp'];
        $stm = $cnx->prepare("UPDATE admin set mdp=? where email=? ");
        $stm->execute(array($mdp, $_SESSION['EmailR'] ));
        $count =$stm->rowCount();
        
        if($count>0)
        {
          $alert="<div class='alert alert-success'>Mot de passe bien modifier <a href='login.php'>Login</a></div>";                        
        }else{
         $alert="<div class='alert alert-danger'>Mot de passe non modifier</div>";
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
    <title>Recuperer le mot de passe</title>

    <!-- Fontfaces CSS-->
    <link href="css1/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo1.png">     
    <link href="img/logo1.png" rel="icon">

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
      <div class="container ">
        <div class="login-wrap">
          <div class="login-content">
            <div class="login-logo">
              <a href="http://127.0.0.1/gestion_main/">
                <img src="img/logo1.png" alt="CoolAdmin">
              </a>
            </div>
            <div class="login-form">
              <h2 class="tele2" >Recuperer votre mot de passe </h2>
            </div>
          </div>
        



  <div class="login-form tt1">
    <?php if($a==1){?>

  <?php } ?>
  <?php if($a==1){?>
  <form action="verification.php" method="post">
    <div class="login-form">
      <div class="container tele1">
        <div class="form-group">
          <label for="fname">Saisir le nouveau mot de passe</label>
          <input type="text" id="fname" name="mdp" class="form-control form-control-lg" required>
        </div>
      </div>
      <div class="col-12">
      <button type="submit" name="modifier" value="modifier" class="btn btn-primary py-3 w-100 mb-4">modifier</button>
      </div>
    </div>
  </form>
  <?php }else{ ?>
  <form action="Verification.php" method="post">
    <div class="login-form">
      <div class="container tele1">
        <div class="form-group">
          <?php echo $alert; ?>
          <label for="fname">Saisir numéro de verification</label>
          <input type="text" id="fname" name="number" class="form-control form-control-lg" required>
          
        </div>
      </div>
      <div class="col-12">
      <button type="submit" name="submit" value="Envoyer" class="btn btn-primary py-3 w-100 mb-4">Valider</button>
      </div>
      <div class="register-link">
        <p>Connecter  <a href="login.php"> S’identifier</a></p>
      </div>
    </div>
  </form>
  <?php } ?>
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
  
