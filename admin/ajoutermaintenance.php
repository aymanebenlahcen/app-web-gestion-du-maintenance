<?php
include 'cnxpdo.php';
include 'cnx.php';
include 'header.php';

$a = 0;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["date_debut"]) && isset($_POST["date_fin"]) && isset($_POST["montant"])) {

        $id_maintenance = 'R' . rand(0, 1000000000000);

        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $montant = $_POST['montant'];
        $id_voiture = $_POST['id_voiture'];
        $id_client = $_POST['id_client'];
        $id_equipe = $_POST['id_equipe'];

        $stm = $cnx->prepare("INSERT INTO maintenance (id_maintenance, id_voiture, id_client, id_equipe, date_debut, date_fin, montant) 
            VALUES ('$id_maintenance', '$id_voiture', '$id_client', '$id_equipe', '$date_debut', '$date_fin', '$montant')");
        $stm->execute();
        $count = $stm->rowCount();
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
            <h2>Ajouter la maintenance</h2>
            <div class="card">
                <form action="ajoutermaintenance.php" method="post">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">date debut<span class="text-danger"> *</span></label>
                            <input type="date" id="date_debut" name="date_debut" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">date Fin<span class="text-danger"> *</span></label>
                            <input type="date" id="date_fin" name="date_fin" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">montant<span class="text-danger"> *</span></label>
                            <input type="text" id="montant" name="montant" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Choissir une voiture</label>
                            <select name="id_voiture" id="id_voiture" class="form-control">
                                <?php
                                $voitures = $cnx->prepare("SELECT id_voiture from voiture");
                                $voitures->execute();
                                $count = $voitures->rowCount();
                                foreach ($voitures as $voiture) {
                                ?>
                                    <option><?php echo $voiture['id_voiture']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div></div>
                        <div class="row justify-content-between text-left">
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
                    
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Choissir un equipe</label>
                            <select name="id_equipe" id="id_equipe" class="form-control">
                                <?php
                                $equipes = $cnx->prepare("SELECT id_equipe from equipe");
                                $equipes->execute();
                                $count = $equipes->rowCount();
                                foreach ($equipes as $equipe) {
                                ?>
                                    <option><?php echo $equipe['id_equipe']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6">
                                <button type="submit" name="ajouter" class="btn btn-custom">AJOUTER</button>
                            </div>
                            <div class="form-group col-sm-6">
                                <button onclick="window.location.href = 'reparation.php';" type="submit" name="retour" class="btn btn-custom">Retour</button>
                            </div>
                        </div>
                </form>