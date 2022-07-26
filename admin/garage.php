<?php include 'header.php'; ?>

<h2>Table Garage</h2></br>
<div class="text-center ml-4">
    <form method="GET">
        <i class='bx bx-search icon'></i>
        <input type="text" name="s" id="s" placeholder="Rechercher par ville" autocomplete="off">
        <input class="btn" type="submit" name="chercher" value="chercher">
    </form>
</div>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajoutergarage.php">AJOUTER</a>
</div>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>RS</th>
            <th>ACTIVITE</th>
            <th>VILLE</th>
            <th>TELEPHONE</th>
            <th>ACTION</th>
        </thead>
        <?php
        if (isset($_GET['chercher'])) {
            $s = $_GET['s'];
            $allgarages = $cnx->query("select garage.*, societe.rs from garage 
            inner join societe on societe.id_societe = garage.id_societe");
            if (isset($_GET['s']) and !empty($_GET['s'])) {
                $recherche = htmlspecialchars($_GET['s']);
                $allgarages = $cnx->query("select garage.*, societe.rs from garage 
                inner join societe on societe.id_societe = garage.id_societe WHERE ville like  '%$s%' ");
            }
            if ($allgarages->rowCount() > 0) {
                while ($garage = $allgarages->fetch()) {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $garage['id_garage'] ?>
                            </td>
                            <td>
                                <?php echo $garage['rs'] ?>
                            </td>
                            <td>
                                <?php echo $garage['activite'] ?>
                            </td>
                            <td>
                                <?php echo $garage['ville'] ?>
                            </td>
                            <td>
                                <?php echo $garage['tel'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifiergarage.php?idgarage=<?php echo $garage['id_garage'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimergarage.php?idgarage=<?php echo $garage['id_garage'] ?>"><i class='bx bx-car icon'></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                <?php }
        } else {  ?>
                <?php
                $mysqli = new mysqli("localhost", "root", "", "db_maintenance");
                $mysqli->set_charset("utf8");
                $requete = "select garage.*, societe.rs from garage 
        inner join societe on societe.id_societe = garage.id_societe;";

                $resultat = $mysqli->query($requete); ?>
                <tbody>
                    <?php
                    while ($ligne = $resultat->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $ligne['id_garage'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['rs'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['activite'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['ville'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['tel'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifiergarage.php?idgarage=<?php echo $ligne['id_garage'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimergarage.php?idgarage=<?php echo $ligne['id_garage'] ?>"><i class='bx bx-car icon'></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php }
                    $mysqli->close(); ?>
                </tbody>
    </table>
<?php } ?>