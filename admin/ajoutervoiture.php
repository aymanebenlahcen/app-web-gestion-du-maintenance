<?php
include 'cnxpdo.php';
include 'cnx.php';
include 'header.php';
$a = 0;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (
        isset($_POST["matricule"]) && isset($_POST["marque"]) && isset($_POST["modele"])
        && isset($_POST["couleur"])  && isset($_POST["duree"]) && isset($_POST["annee"])  && isset($_POST["carburant"])
    ) {

        $ImgName = $_FILES['img']['name'];
        $ImgTmp = $_FILES['img']['tmp_name'];
        $explo = explode('.', $ImgName);
        $ImgExtension = strtolower(end($explo));

        $id_voiture = 'R' . rand(0, 1000000000000);
        $matricule = $_POST['matricule'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $couleur = $_POST['couleur'];
        $duree = $_POST['duree'];
        $id_client = $_POST['id_client'];

        $img = rand(0, 1000) . '_' . $ImgName;
        $annee = $_POST['annee'];
        $carburant = $_POST['carburant'];

        $stm = $cnx->prepare("INSERT INTO voiture (id_voiture,id_client, matricule,marque, modele, couleur, duree, img, annee, carburant) VALUES 
        ('$id_voiture','$id_client','$matricule','$marque','$modele','$couleur','$duree','$img','$annee','$carburant')");
        $stm->execute();
        $count = $stm->rowCount();

        if ($count > 0) {
            move_uploaded_file($ImgTmp, "img//$img");
            $a = 1;
        } else {
            $a = -1;
        }
    }
}
?>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<style>
    body {
        height: 100%;
    }

    .card {
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
    }

    .blue-text {
        color: #00BCD4
    }

    .py-5 {
        padding-top: 0rem !important;
        padding-bottom: 1rem !important;
    }

    .px-1 {
        padding-right: 1rem !important;
        padding-left: 1rem !important;
    }

    .form-control-label {
        margin-bottom: 0
    }

    input,
    textarea,
    button {
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
    }

    .ol,
    ul {
        padding-left: 0rem;
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400
    }

    .btn-block {
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer
    }

    .btn-primary {
        cursor: pointer;
        position: absolute;
        top: 283px;
        left: 380px;

    }

    .btn-block:hover {
        color: #fff !important
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }
</style>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h2>Ajouter une nouvelle voiture </h2>
            <div class="card">
                <form action="ajoutervoiture.php" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <?php
                        if ($a == 1) { ?>
                            <div class="alert alert-primary" role="alert">
                                Voiture Bien Ajouter
                            </div>
                        <?php  } elseif ($a == -1) { ?>
                            <div class="alert alert-primary" role="alert">
                                Voiture non Ajouter
                            </div>
                        <?php } ?>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Matricule<span class="text-danger"> *</span></label>
                                <input type="text" id="matricule" name="matricule" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Marque<span class="text-danger"> *</span></label>
                                <input type="text" id="marque" name="marque" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Modele<span class="text-danger"> *</span></label>
                                <input type="text" id="modele" name="modele" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Couleur<span class="text-danger"> *</span></label>
                                <input type="text" id="couleur" name="couleur" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Durée<span class="text-danger"> *</span></label>
                                <input type="text" id="duree" name="duree" placeholder="" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Année<span class="text-danger"> *</span></label>
                                <input type="text" id="annee" name="annee" placeholder="" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Type de carburant<span class="text-danger"> *</span></label>
                                <select class="form-control" id="carburant" onblur="validate(5)" name="carburant" required>
                                    <option>Essance</option>
                                    <option>Diesel</option>
                                    <option>Hybride</option>
                                    <option>Electrique</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label>Choissir un client</label>
                                <select name="id_client" id="id_client" class="form-control">
                                    <?php
                                    $clients = $cnx->prepare("SELECT id_client from client");
                                    $clients->execute();
                                    $count = $clients->rowCount();
                                    foreach ($clients as $client) {
                                    ?>
                                        <option><?php echo $client['id_client']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <div class="col-md-12 form-group">
                                        <label for="fname">Iamge</label>
                                        <div class="custom-file">
                                            <input type="file" name="img" class="custom-file-input" id="inputGroupFile01">
                                            <label style="height: 48px;padding-top: 9px; width: 100%;" class="custom-file-label" for="inputGroupFile01"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-group col-sm-6">
                                    <button type="submit" name="modifier" class="btn btn-custom">AJOUTER</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <button onclick="window.location.href = 'voiture.php';" type="submit" name="retour" class="btn btn-custom">Retour</button>
                                </div>
                            </div>
                </form>