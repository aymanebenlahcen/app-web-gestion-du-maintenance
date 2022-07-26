<?php include 'header.php'; ?>

<link rel="stylesheet" href="css/style1.css">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main1.js"></script>


<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">
                <?php
                $query = "SELECT id_voiture from voiture order by id_voiture";
                $resultat = mysqli_query($con, $query);
                $row = mysqli_num_rows($resultat);
                echo  $row
                ?>
            </div>
            <div class="cardName">Voiture</div>
        </div>

        <div class="iconBx">
            <i class='bx bx-car icon'></i>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">
                <?php
                $query = "SELECT id_client from client order by id_client";
                $resultat = mysqli_query($con, $query);
                $row = mysqli_num_rows($resultat);
                echo  $row
                ?>
            </div>
            <div class="cardName">Client</div>
        </div>

        <div class="iconBx">
            <i class='bx bxs-group icon'></i>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">
                <?php
                $query = "SELECT id_maintenance from maintenance order by id_maintenance";
                $resultat = mysqli_query($con, $query);
                $row = mysqli_num_rows($resultat);
                echo  $row
                ?>
            </div>
            <div class="cardName">Maintenance</div>
        </div>

        <div class="iconBx">
            <i class='bx bx-notepad icon'></i>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">
                <?php
                $query = "SELECT id_employeur from employeur order by id_employeur";
                $resultat = mysqli_query($con, $query);
                $row = mysqli_num_rows($resultat);
                echo  $row
                ?>
            </div>
            <div class="cardName">Employeur</div>
        </div>

        <div class="iconBx">
            <i class='bx bxs-user icon'></i>
        </div>
    </div>
</div>

<?php
$mysqli = new mysqli("localhost", "root", "", "db_maintenance");
$mysqli->set_charset("utf8");
$requete = "SELECT m.*, c.nom,c.prenom ,v.matricule,v.marque, eq.referance
            from maintenance m, client c,voiture v , equipe eq 
            where m.id_client = c.id_client and v.id_voiture=m.id_voiture 
            and eq.id_equipe=m.id_equipe;";
$resultat = $mysqli->query($requete);
?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent maintenance</h2>
            <a href="reparation.php" class="btn">Voir tout</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>NOM CLIENT</td>
                    <td>PRENOM CLIENT</td>
                    <td>MATRICULE</td>
                    <td>MARQUE</td>
                    <td>EQUIPE</td>
                    <td>DATE DEBUT</td>
                    <td>DATE FIN</td>
                    <td>MONTANT</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($ligne = $resultat->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?= $ligne['id_maintenance'] ?>
                        </td>
                        <td>
                            <?= $ligne['nom'] ?>
                        </td>
                        <td>
                            <?= $ligne['prenom'] ?>
                        </td>
                        <td>
                            <?= $ligne['matricule'] ?>
                        </td>
                        <td>
                            <?= $ligne['marque'] ?>
                        </td>
                        <td>
                            <?= $ligne['referance'] ?>
                        </td>
                        <td>
                            <?= $ligne['date_debut'] ?>
                        </td>
                        <td>
                            <?= $ligne['date_fin'] ?>
                        </td>
                        <td>
                            <?= $ligne['montant'] ?>
                        </td>
                    </tr>
                <?php }
                $mysqli->close(); ?>
            </tbody>
        </table>
    </div>
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Recent Equipe</h2>
            <a href="equipe.php" class="btn">Voir tout</a>
        </div>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "db_maintenance");
        $mysqli->set_charset("utf8");
        $requete2 = "select equipe.*, garage.ville from equipe
                inner join garage on equipe.id_garage = garage.id_garage;";
        $resultat2 = $mysqli->query($requete2); ?>
        <table>
            <?php
            while ($ligne = $resultat2->fetch_assoc()) {
            ?>
                <tr>
                    <td width="60px">
                    <td>
                        <h4><?php echo $ligne['secteur'] ?> <br> <span> <?php echo $ligne['ville'] ?></span></h4>
                    </td>
                </tr>
            <?php }
            $mysqli->close(); ?>
        </table>
    </div>
</div>