<?php include 'header.php'; ?>

<h2>Table employeurs</h2></br>
<div class="text-center ml-4">
    <form method="GET">
        <i class='bx bx-search icon'></i>
        <input type="text" name="s" id="s" placeholder="Rechercher par son nom" autocomplete="off">
        <input class="btn" type="submit" name="chercher" value="chercher">
    </form>
</div>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajouteremployeur.php">AJOUTER</a>
</div>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>EQUIPE REF</th>
            <th>SECTEUR</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>ADRESSE</th>
            <th>DATE NAISSANCE</th>
            <th>ROLE</th>
            <th>ACTION</th>
        </thead>
        <?php
        if (isset($_GET['chercher'])) {
            $s = $_GET['s'];
            $allemployeurs = $cnx->query("select employeur.*, equipe.referance , equipe.secteur from employeur
            inner join equipe on employeur.id_equipe = equipe.id_equipe");
            if (isset($_GET['s']) and !empty($_GET['s'])) {
                $recherche = htmlspecialchars($_GET['s']);
                $allemployeurs = $cnx->query("select employeur.*, equipe.referance , equipe.secteur from employeur
                inner join equipe on employeur.id_equipe = equipe.id_equipe WHERE email like  '%$s%' ");
            }
            if ($allemployeurs->rowCount() > 0) {
                while ($employeur = $allemployeurs->fetch()) {
        ?>
        <tbody>
                <tr>
                    <td>
                        <?php echo $employeur['id_employeur'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['nom'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['prenom'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['referance'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['secteur'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['tel'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['email'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['adresse'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['date_nais'] ?>
                    </td>
                    <td>
                        <?php echo $employeur['role'] ?>
                    </td>
                    <td>
                        <div class="aymxx">
                            <a class="btn btn-custom" href="modifieremployeur.php?idemployeur=<?php echo $employeur['id_employeur'] ?>"><i class='bx bx-edit icon'></i></a>
                            <a class="btn btn-custom" href="supprimeremployeur.php?idemployeur=<?php echo $employeur['id_employeur'] ?>"><i class='bx bx-car icon'></i></a>
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
$requete = "select employeur.*, equipe.referance , equipe.secteur from employeur
inner join equipe on employeur.id_equipe = equipe.id_equipe";
$resultat = $mysqli->query($requete); ?>
        <tbody>
            <?php
            while ($ligne = $resultat->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <?php echo $ligne['id_employeur'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['nom'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['prenom'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['referance'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['secteur'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['tel'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['email'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['adresse'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['date_nais'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['role'] ?>
                    </td>
                    <td>
                        <div class="aymxx">
                            <a class="btn btn-custom" href="modifieremployeur.php?idemployeur=<?php echo $ligne['id_employeur'] ?>"><i class='bx bx-edit icon'></i></a>
                            <a class="btn btn-custom" href="supprimeremployeur.php?idemployeur=<?php echo $ligne['id_employeur'] ?>"><i class='bx bx-car icon'></i></a>
                        </div>
                    </td>
                    </tr>
                    <?php }
                    $mysqli->close(); ?>
                </tbody>
    </table>
<?php } ?>