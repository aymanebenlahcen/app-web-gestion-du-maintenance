<?php
  include 'cnxpdo.php';
  include 'functions/functions.php';
  session_start();
  if(isset($_SESSION['admin']))
  {
    header("location:index.php");
    exit();
  }
 if(isset($_POST['login']))
 {
     $email = $_POST['email'];
     $mdp = $_POST['mdp'];

     $query = "SELECT * FROM admin WHERE email = '$email' AND mdp = '$mdp'";
     $stmt = $cnx->prepare($query);
     $stmt->execute();
     $count = $stmt->rowCount();
     if($count>0)
     {
         $_SESSION['admin'] = $email;
         header("location:index.php");
         exit();

     }
     else
     {
         $error = "<span class='text-danger'>Email ou Mot de passe Incorrect</span>";
     }
 } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>
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

<body class="animsition">
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
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>E-mail </label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Entrer Votre Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input class="au-input au-input--full" type="password" name="mdp" placeholder="Entrer Votre Mot de passe" required>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="RecupererMDP.php">Vous avez oublié votre mot de passe ?</a>
                                    </label>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Se Connecter</button>
                                <?php if(isset($error))echo $error; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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