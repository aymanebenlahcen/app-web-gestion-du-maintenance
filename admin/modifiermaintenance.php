<?php
include 'header.php';
include 'cnxpdo.php';
$idmaintenance = $_GET['idmaintenance'];
if (isset($_GET['idmaintenance'])) {
    $idvoitrue = $_GET['idmaintenance'];
    $req = $cnx->query("select * from maintenance where id_maintenance = $idmaintenance");
    $ligne = $req->fetch();
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
            <h2>Modifier la maintenance N°:<?php echo $idmaintenance ?></h2>
            <div class="card">
                <form action="" method="post">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Date début<span class="text-danger"> *</span></label>
                            <input type="text" id="date_debut" name="date_debut" value="<?php echo $ligne['date_debut'] ?>"required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Date fin<span class="text-danger"> *</span></label>
                            <input type="text" id="date_fin" name="date_fin" value="<?php echo $ligne['date_fin'] ?>" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Montant<span class="text-danger"> *</span></label>
                            <input type="text" id="montant" name="montant" value="<?php echo $ligne['montant'] ?>" required>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6">
                            <button type="submit" name="modifier" class="btn btn-custom">enregistrer les modification</button>
                        </div>
                        
                    </div>
                </form>
                <?php
                if (isset($_POST['modifier'])) {
                    $date_debut = $_POST['date_debut'];
                    $date_fin = $_POST['date_fin'];
                    $montant = $_POST['montant'];
                    $req = $cnx->prepare("UPDATE maintenance SET date_debut = ? , date_fin = ? , montant = ? WHERE id_maintenance = $idmaintenance");
                    $req->execute(array($date_debut, $date_fin, $montant));
                }
                ?>
            </div>
        </div>
    </div>
</div>