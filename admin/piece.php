<?php include 'header.php'; ?>

<h2>Table piece</h2></br>
<div class="text-center ml-4">
    <form method="GET">
        <i class='bx bx-search icon'></i>
        <input type="text" name="s" id="s" placeholder="Rechercher par son nom" autocomplete="off">
        <input class="btn" type="submit" name="chercher" value="chercher">
    </form>
</div>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajouterpiece.php">AJOUTER</a>
</div>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>LIBELLE</th>
            <th>REFERANCE</th>
            <th>VILLE GARAGE</th>
            <th>PRIX</th>
            <th>ACTION</th>
        </thead>
        <?php
        if (isset($_GET['chercher'])) {
            $s = $_GET['s'];
            $allpieces = $cnx->query("select piece.*, garage.ville from piece
            inner join garage on piece.id_garage = garage.id_garage");
            if (isset($_GET['s']) and !empty($_GET['s'])) {
                $recherche = htmlspecialchars($_GET['s']);
                $allpieces = $cnx->query("select piece.*, garage.ville from piece
                inner join garage on piece.id_garage = garage.id_garage where referance like  '%$s%' ");
            }
            if ($allpieces->rowCount() > 0) {
                while ($piece = $allpieces->fetch()) {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $piece['id_piece'] ?>
                            </td>
                            <td>
                                <?php echo $piece['libelle'] ?>
                            </td>
                            <td>
                                <?php echo $piece['referance'] ?>
                            </td>
                            <td>
                                <?php echo $piece['ville'] ?>
                            </td>
                            <td>
                                <?php echo $piece['prix'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifierpiece.php?idpiece=<?php echo $piece['id_piece'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimerpiece.php?idpiece=<?php echo $piece['id_piece'] ?>"><i class='bx bx-car icon'></i></a>
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
                $requete = "select piece.*, garage.ville from piece
inner join garage on piece.id_garage = garage.id_garage";
                $resultat = $mysqli->query($requete); ?>

                <tbody>
                    <?php
                    while ($ligne = $resultat->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $ligne['id_piece'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['libelle'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['referance'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['ville'] ?>
                            </td>
                            <td>
                                <?php echo $ligne['prix'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifierpiece.php?idpiece=<?php echo $ligne['id_piece'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimerpiece.php?idpiece=<?php echo $ligne['id_piece'] ?>"><i class='bx bx-car icon'></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php }
                    $mysqli->close(); ?>
                </tbody>
    </table>
<?php } ?>