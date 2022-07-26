<?php include 'header.php'; ?>

<h2>Table Voitures</h2></br>
<div class="text-center ml-4">
    <form method="GET">
        <i class='bx bx-search icon'></i>
        <input type="text" name="s" id="s" placeholder="Rechercher par son nom" autocomplete="off">
        <input class="btn" type="submit" name="chercher" value="chercher">
    </form>
</div>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajoutervoiture.php">AJOUTER</a>
</div>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>IMAGE</th>
            <th>ID</th>
            <th>MATRICULE</th>
            <th>NOM DE PRORITAIRE</th>
            <th>PRENOM DE PRORITAIRE</th>
            <th>MARQUE</th>
            <th>MODELE</th>
            <th>COULEUR</th>
            <th>DUREE</th>
            <th>ANNEE</th>
            <th>CARBURANT</th>
            <th>ACTION</th>
        </thead>
        <?php
        if (isset($_GET['chercher'])) {
            $s = $_GET['s'];
            $allvoitures = $cnx->query("select voiture.*, client.nom , client.prenom from voiture
            inner join client on voiture.id_client = client.id_client");
            if (isset($_GET['s']) and !empty($_GET['s'])) {
                $recherche = htmlspecialchars($_GET['s']);
                $allvoitures = $cnx->query("select voiture.*, client.nom , client.prenom from voiture
                inner join client on voiture.id_client = client.id_client  WHERE matricule like  '%$s%' ");
            }
            if ($allvoitures->rowCount() > 0) {
                while ($voiture = $allvoitures->fetch()) {
        ?>
                    <tbody>
                        <tr>
                            <td class="img12">
                                <img src="img/<?php echo $voiture['img']  ?>" style="width: 40px; height: 40px;">
                            </td>
                            <td>
                                <?php echo $voiture['id_voiture'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['matricule'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['nom'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['prenom'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['marque'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['modele'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['couleur'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['duree'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['annee'] ?>
                            </td>
                            <td>
                                <?php echo $voiture['carburant'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifiervoiture.php?idvoiture=<?php echo $voiture['id_voiture'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimervoiture.php?idvoiture=<?php echo $voiture['id_voiture'] ?>"><i class='bx bx-car icon'></i></a>
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
                $requete = "select voiture.*, client.nom , client.prenom from voiture
inner join client on voiture.id_client = client.id_client";
                $resultat = $mysqli->query($requete); ?>
                <tbody>
                    <?php
                    while ($ligne = $resultat->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="img12">
                                <img src="img/<?php echo $ligne['img']  ?>" style="width: 40px; height: 40px;">
                            </td>
                            <td>
                                <?php echo $ligne['id_voiture'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['matricule'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['nom'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['prenom'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['marque'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['modele'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['couleur'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['duree'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['annee'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['carburant'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifiervoiture.php?idvoiture=<?php echo $ligne['id_voiture'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimervoiture.php?idvoiture=<?php echo $ligne['id_voiture'] ?>"><i class='bx bx-car icon'></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php }
                    $mysqli->close(); ?>
                </tbody>
    </table>
<?php } ?>