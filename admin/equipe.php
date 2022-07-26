<?php include 'header.php'; ?>

<h2>Table Equipe</h2></br>
<div class="text-center ml-4">
    <form method="GET">
        <i class='bx bx-search icon'></i>
        <input type="text" name="s" id="s" placeholder="Rechercher par son nom" autocomplete="off">
        <input class="btn" type="submit" name="chercher" value="chercher">
    </form>
</div>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajouterequipe.php">AJOUTER</a>
</div>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>GARAGE</th>
            <th>SECTEUR</th>
            <th>REFERANCE</th>
            <th>ACTION</th>
        </thead>
        <?php
        if (isset($_GET['chercher'])) {
            $s = $_GET['s'];
            $allequipes = $cnx->query("select equipe.*, garage.ville from equipe
            inner join garage on equipe.id_garage = garage.id_garage");
            if (isset($_GET['s']) and !empty($_GET['s'])) {
                $recherche = htmlspecialchars($_GET['s']);
                $allequipes = $cnx->query("select equipe.*, garage.ville from equipe
                inner join garage on equipe.id_garage = garage.id_garage where referance like  '%$s%' ");
            }
            if ($allequipes->rowCount() > 0) {
                while ($equipe = $allequipes->fetch()) {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $equipe['id_equipe'] ?>
                            </td>
                            <td>
                                <?php echo $equipe['ville'] ?>
                            </td>
                            <td>
                                <?php echo $equipe['secteur'] ?>
                            </td>
                            <td>
                                <?php echo $equipe['referance'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifierequipe.php?idequipe=<?php echo $equipe['id_equipe'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimerequipe.php?idequipe=<?php echo $equipe['id_equipe'] ?>"><i class='bx bx-car icon'></i></a>
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
                $requete = "select equipe.*, garage.ville from equipe
inner join garage on equipe.id_garage = garage.id_garage;";

                $resultat = $mysqli->query($requete); ?>

                <tbody>
                    <?php
                    while ($ligne = $resultat->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $ligne['id_equipe'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['ville'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['secteur'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['referance'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifierequipe.php?idequipe=<?php echo $ligne['id_equipe'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimerequipe.php?idequipe=<?php echo $ligne['id_equipe'] ?>"><i class='bx bx-car icon'></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php }
                    $mysqli->close(); ?>
                </tbody>
    </table>
<?php } ?>