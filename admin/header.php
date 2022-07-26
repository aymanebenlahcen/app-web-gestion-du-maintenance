<?php
include 'cnxpdo.php';
include 'cnx.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link href="img/logo1.png" rel="icon">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo1.png">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="img/logo.png" rel="icon">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo1.png">
    <title>MPE motors Performance - Développement de cartographie moteur</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="index.php">
                        <img src="img/logo.jpeg" alt="">
                    </a>
                </span>
                <div class="text logo-text">
                    <span class="name">MPE - Motors </span>
                    <span class="profession">Performance</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="client.php">
                            <i class='bx bxs-group icon'></i>
                            <span class="text nav-text">Client</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="voiture.php">
                            <i class='bx bx-car icon'></i>
                            <span class="text nav-text">Voiture</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="piece.php">
                            <i class='bx bx-car icon'></i>
                            <span class="text nav-text">Piéce</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="equipe.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Equipe</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="employeur.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Employeur</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="reparation.php">
                            <i class='bx bx-notepad icon'></i>
                            <span class="text nav-text">Reparation</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="user.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Admin</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="garage.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Garage</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Se déconnecter</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <section class="home">
        <div class="tfff">
            <header class="headerf">
                <img class="logo" src="img/image2.png" alt="logo">
                <span class="userrr">
                    <?php
                    $email = $_SESSION['admin'];
                    $query = "select * from admin where email = '$email'";
                    $stm = $cnx->prepare($query);
                    $stm->execute();
                    $admin = $stm->fetch();
                    echo $admin['nom'] . ' ' . $admin['prenom'];
                    ?></ </span>
                    <div class="dropdown">
                        <button class="dropbtn"><i class='bx bxs-down-arrow'></i></button>
                        <div class="dropdown-content">
                            <a href="changeMDP.php">Changer le mot de passe</a>
                            <a href="logout.php">Deconnecter</a>
                        </div>
                    </div>
            </header>


            <script src="js/script.js"></script>