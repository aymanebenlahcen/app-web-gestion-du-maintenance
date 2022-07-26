<?php
include 'cnxpdo.php';
include 'header.php';

$a = 0;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["libelle"]) && isset($_POST["referance"]) && isset($_POST["prix"])) {

        $id_piece = 'R' . rand(0, 1000000000000);
        $id_garage = $_POST['id_garage'];
        $libelle = $_POST['libelle'];
        $referance = $_POST['referance'];
        $prix = $_POST['prix'];

        $stm = $cnx->prepare("INSERT INTO piece (id_piece,id_garage, libelle, referance, prix) VALUES 
        ('$id_piece','$id_garage','$libelle','$referance','$prix')");
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
            <h2>Ajouter la piece</h2>
            <div class="card">
                <form action="" method="post">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Libelle<span class="text-danger"> *</span></label>
                            <input type="text" id="libelle" name="libelle"required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Réferance<span class="text-danger"> *</span></label>
                            <input type="text" id="referance" name="referance"required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Prix<span class="text-danger"> *</span></label>
                            <input type="text" id="prix" name="prix" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                                <label>Choissir le garage</label>
                                <select name="id_garage" id="id_garage" class="form-control">
                                    <?php
                                    $garages = $cnx->prepare("SELECT id_garage from garage");
                                    $garages->execute();
                                    $count = $garages->rowCount();
                                    foreach ($garages as $garage) {
                                    ?>
                                        <option><?php echo $garage['id_garage']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                    </div>
                    <div class="row justify-content-end">
                    <div class="form-group col-sm-6">
                        <button type="submit" name="ajouter" class="btn btn-custom">AJOUTER</button>
                    </div>
                    <div class="form-group col-sm-6">
                        <button onclick="window.location.href = 'piece.php';" type="submit" name="retour" class="btn btn-custom">Retour</button>
                    </div>
                </div>
                </form>
