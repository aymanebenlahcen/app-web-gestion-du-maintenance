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

        <!--  -->
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            .myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }
            .myImg:hover {opacity: 0.7;}
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }
            
            /* Modal Content (image) */
            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }
            
            /* Caption of Modal Image */
            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }
            
            /* Add Animation */
            .modal-content, #caption {  
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }
            
            @-webkit-keyframes zoom {
                from {-webkit-transform:scale(0)} 
                to {-webkit-transform:scale(1)}
            }
            
            @keyframes zoom {
                from {transform:scale(0)} 
                to {transform:scale(1)}
            }
            
            /* The Close Button */
            .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }
            
            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }
            
            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
                .modal-content {
                width: 100%;
                }
            }
        </style>
    </head>
    <?php include 'header.php'; ?>
    <body>
    <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>CARS</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Acceuil</a>
                        <a href="seupercars.php">Voitures préparer</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Voitures préparer</p>
                <h2>Véhicules Stage 1 et +</h2>
            </div>
            <div class="row">
                <div class="column">
                    <img class="myImg" src="img/1.jpg" alt="Snow" style="width: 100%;height: 100%;">
                </div>
                <div class="column">
                    <img class="myImg" src="img/2.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/3.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/4.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/5.jpg" alt="Snow" style="width: 100%;height: 100%;">
                </div>
                <div class="column">
                    <img class="myImg" src="img/6.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/7.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/8.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/9.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/10.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/11.jpg" alt="Snow" style="width:100%">
                </div>
                <div class="column">
                    <img class="myImg" src="img/12.jpg" alt="Snow" style="width:100%">
                </div>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
        </div>
            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.querySelectorAll(".myImg");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                console.log('click');
                captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                modal.style.display = "none";
                }
            </script>
    <div>
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