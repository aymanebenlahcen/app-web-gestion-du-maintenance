<?php include 'header.php';


if (isset($_POST['submit'])) {
    $email = $_SESSION['admin'];
    $oldPsw = $_POST['oldPsw'];
    $newPsw = $_POST['newPsw'];

    $query = "SELECT * FROM admin WHERE email = '$email' AND mdp = '$oldPsw'";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        if (update("admin", "SET mdp = '$newPsw' WHERE email = '$email'")) {
            echo "
               <script>
                 alert('Votre Mot de passe Bien modifier!');
                 window.open('?content=changer-mdp','_self');
               </script>
             ";
        } else {
            echo "
            <script>
              alert('ERROR IN SERVER !');
              window.open('?content=changer-mdp','_self');
            </script>
          ";
        }
    } else {
        echo "
        <script>
          alert('Mot de passe Incorrect !');
          window.open('?content=changer-mdp','_self');
        </script>
      ";
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
            <h2>Changer Votre Mot de passe</h2>
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Ancien mot de passe<span class="text-danger"> *</span></label>
                            <input type="password" name="oldPsw" class="form-control" placeholder="entrez votre ancien mot de passe" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Nouveau mot de passe<span class="text-danger"> *</span></label>
                            <input type="password" name="newPsw" class="form-control" placeholder="entrez votre nouveau mot de passe" required>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6">
                            <button type="submit" name="submit" class="btn btn-custom">ENREGISTRER</button>
                        </div>
                        <div class="form-group col-sm-6">
                            <button onclick="window.location.href = 'employeur.php';" type="submit" name="retour" class="btn btn-custom">Retour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>