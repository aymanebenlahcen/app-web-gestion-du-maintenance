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
<?php include 'header.php';
include 'C:\xampp\htdocs\gestion_main\admin/cnxpdo.php';
include 'C:\xampp\htdocs\gestion_main\admin/cnx.php';
?>

<body>

    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/10.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h3>MPE motors Performance</h3>
                        <h1>Reprogrammation Sur Mesure</h1>
                        <p>
                            Nos fichiers sont développés en interne par nos ingénieurs MPE.
                            Chaque reprogrammation est réalisée et adaptée à votre véhicule. </p>
                        <a class="btn btn-custom" href="about.php">Voir Plus</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/8.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h3>Développement de cartographie moteur</h3>
                        <h1>Economie de Carburant</h1>
                        <p>
                            Baisse de la consommation de carburant grâce au surplus de couple.
                            Moins de consommation = Moins de Pollution</p>
                        <a class="btn btn-custom" href="about.php">Voir Plus</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/carousel-3.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h3>Leader en développement de cartographie moteur</h3>
                        <h1>Meilleur agrément de conduite</h1>
                        <p>
                            Moteur plus souple, plus besoin de rétrograder lors des reprises.
                            Plus de sécurité lors des dépassements.</p>
                        <a class="btn btn-custom" href="about.php">Voir Plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <iframe src="https://www.youtube.com/embed/BKHcOTVbLUQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header text-left">
                        <p>PRESENTATION</p>
                        <h2>MPE motors Performance</h2>
                    </div>
                    <div class="about-content">
                        <p>
                            MPE dispose d’un atelier à la pointe de la technologie équipé de tout le matériel nécessaire pour développer sur les calculateurs et de deux autres sites pour réaliser les essais sur banc de puissance. </p>
                        <ul>
                            <li><i class="far fa-check-circle"></i>Augmentation de la puissance</li>
                            <li><i class="far fa-check-circle"></i>Economie de carburant</li>
                            <li><i class="far fa-check-circle"></i>Conversion Flex Fuel</li>
                            <li><i class="far fa-check-circle"></i>Respect des normes anti-pollution</li>
                        </ul>
                        <a class="btn btn-custom" href="location.php">Voir Plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Facts Start -->
    <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="facts-item">
                        <i class="fa fa-map-marker-alt"></i>
                        <div class="facts-text">
                            <h3 data-toggle="counter-up">
                                <?php
                                $query = "SELECT id_garage from garage order by id_garage";
                                $resultat = mysqli_query($con, $query);
                                $row = mysqli_num_rows($resultat);
                                echo  $row
                                ?>
                            </h3>
                            <p>Centres de service</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="facts-item">
                        <i class="fa fa-user"></i>
                        <div class="facts-text">
                            <h3 data-toggle="counter-up">
                                <?php
                                $query = "SELECT id_employeur from employeur order by id_employeur";
                                $resultat = mysqli_query($con, $query);
                                $row = mysqli_num_rows($resultat);
                                echo  $row
                                ?>
                            </h3>
                            <p>Ingénieurs & Ouvriers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="facts-item">
                        <i class="fa fa-users"></i>
                        <div class="facts-text">
                            <h3 data-toggle="counter-up">
                                <?php
                                $query = "SELECT id_voiture from voiture order by id_voiture";
                                $resultat = mysqli_query($con, $query);
                                $row = mysqli_num_rows($resultat);
                                echo  $row
                                ?>
                            </h3>
                            <p>voitures reprogramme</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="facts-item">
                        <i class="fa fa-check"></i>
                        <div class="facts-text">
                            <h3 data-toggle="counter-up">
                            <?php
                                $query = "SELECT id_client from client order by id_client";
                                $resultat = mysqli_query($con, $query);
                                $row = mysqli_num_rows($resultat);
                                echo  $row
                                ?>
                            </h3>
                            <p>Clients satisfaits</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Price Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Nos Offres</p>
                <h2>Choisissez votre forfait</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-header">
                            <h3>Diagnostic</h3>
                            <h2><span>DH</span><strong>499</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>FORFAIT LECTURE</li>
                                <li><i class="far fa-check-circle"></i>EFFACEMENT DÉFAUTS</li>
                                <li><i class="far fa-check-circle"></i>ADAPTATION PIÈCES</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" href="contact.php">Réserver maintenant</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-item featured-item">
                        <div class="price-header">
                            <h3>Reprogrammation</h3>
                            <h2><span>DH</span><strong>2199</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i> Changement Cartographie</li>
                                <li><i class="far fa-check-circle"></i>Changement échappement</li>
                                <li><i class="far fa-check-circle"></i>Admission</li>
                                <li><i class="far fa-check-circle"></i>Changement de turbo</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" href="contact.php">Réserver maintenant</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-header">
                            <h3>Antipollution</h3>
                            <h2><span>DH</span><strong>549</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>FILTRE À PARTICULE (FAP)</li>
                                <li><i class="far fa-check-circle"></i>VANNE EGR</li>
                                <li><i class="far fa-check-circle"></i>AD BLUE (SCR)</li>
                                <li><i class="far fa-check-circle"></i>CATALISEUR</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" href="contact.php">Réserver maintenant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price End -->



    <!-- Testimonial Start -->
    <div class="testimonial">
        <div class="container">
            <div class="section-header text-center">
                <p>TÉMOIGNAGE</p>
                <h2>Ce que disent nos clients ?</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <img src="img/testimonial-2.jfif" alt="Image">
                    <div class="testimonial-text">
                        <h3>Karim Alaoui</h3>
                        <h4>Propriétaire de Ferrari 488 pista</h4>
                        <p>
                            Super travaille déjà quatre vehicule réaliser et toujour aussi bon je recommande. On as l'impression de changer de vehicule et économiser de essence ou gazoil. Très content
                        </p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img src="img/testimonial-3.jfif" alt="Image">
                    <div class="testimonial-text">
                        <h3>Hatim M3</h3>
                        <h4>Propriétaire de Alfa romio</h4>
                        <p>
                            Merci a MPE Performance Tanger pour son boulot sur mon Alfa romio stage 2 après quelques sueurs et pas mal de temps de travail une voiture réglé au petit oignon et un couple à rester coller au siège ! </p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img src="img/testimonial-1.jpg" alt="Image">
                    <div class="testimonial-text">
                        <h3>Aymane Benlahcen</h3>
                        <h4>Propriétaire de Lamborgini URUS</h4>
                        <p>
                            la voiture est maintenant complètement differente, le gros couple dès 1700 t/min est juste formidable en montage, même plus besoin de monter dans les tours pour les dépassements En conclusion je recommande MPE performance Tanger les yeux fermés ! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <div class="fourteen columns norightpadding smallbottompadding youtube">
        <section class="box box-border">
            <header class="title"> </header>
        </section>
    </div>
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