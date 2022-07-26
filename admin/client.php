<?php include 'header.php'; ?>

<h2>Table Clients</h2></br>
<div class="text-center ml-4">
    <form method="GET">
        <i class='bx bx-search icon'></i>
        <input type="text" name="s" id="s" placeholder="Rechercher par son nom" autocomplete="off">
        <input class="btn" type="submit" name="chercher" value="chercher">
    </form>
</div>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajouterclient.php">AJOUTER</a>
</div>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>VILLE</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>TYPE</th>
            <th>ACTION</th>
        </thead>
        <?php
        if (isset($_GET['chercher'])) {
            $s = $_GET['s'];
            $allclients = $cnx->query("SELECT * FROM client;");
            if (isset($_GET['s']) and !empty($_GET['s'])) {
                $recherche = htmlspecialchars($_GET['s']);
                $allclients = $cnx->query("SELECT * FROM client WHERE nom like  '%$s%' ");
            }
            if ($allclients->rowCount() > 0) {
                while ($client = $allclients->fetch()) {
        ?>

                    <tbody>
                        <tr>
                            <td>
                                <?php echo $client['id_client'] ?>
                            </td>
                            <td>
                                <?php echo $client['nom'] ?>
                            </td>
                            <td>
                                <?php echo $client['prenom'] ?>
                            </td>
                            <td>
                                <?php echo $client['ville'] ?>
                            </td>
                            <td>
                                <?php echo $client['tel'] ?>
                            </td>
                            <td>
                                <?php echo $client['email'] ?>
                            </td>
                            <td>
                                <?php echo $client['type'] ?>
                            </td>
                            <td>
                                <div class="aymxx">
                                    <a class="btn btn-custom" href="modifierclient.php?idclient=<?php echo $client['id_client'] ?>"><i class='bx bx-edit icon'></i></a>
                                    <a class="btn btn-custom" href="supprimerclient.php?idclient=<?php echo $client['id_client'] ?>"><i class='bx bx-car icon'></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
    </table>
<?php }
        } else {  ?>
<?php
            $mysqli = new mysqli("localhost", "root", "", "db_maintenance");
            $mysqli->set_charset("utf8");
            $requete = "SELECT * FROM client";
            $resultat = $mysqli->query($requete); ?>
<tbody>
    <?php
            while ($ligne = $resultat->fetch_assoc()) {
    ?>
        <tr>
            <td>
                <?php echo $ligne['id_client'] ?>
            </td>
            <td>
                <?php echo $ligne['nom'] ?>
            </td>
            <td>
                <?php echo $ligne['prenom'] ?>
            </td>
            <td>
                <?php echo $ligne['ville'] ?>
            </td>
            <td>
                <?php echo $ligne['tel'] ?>
            </td>
            <td>
                <?php echo $ligne['email'] ?>
            </td>
            <td>
                <?php echo $ligne['type'] ?>
            </td>
            <td>
                <div class="aymxx">
                    <a class="btn btn-custom" href="modifierclient.php?idclient=<?php echo $ligne['id_client'] ?>"><i class='bx bx-edit icon'></i></a>
                    <a class="btn btn-custom" href="supprimerclient.php?idclient=<?php echo $ligne['id_client'] ?>"><i class='bx bx-car icon'></i></a>
                </div>
            </td>
        </tr>
    <?php }
            $mysqli->close(); ?>
</tbody>
</table>
<?php } ?>