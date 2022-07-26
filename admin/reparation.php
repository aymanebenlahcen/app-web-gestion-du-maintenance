<?php
include 'header.php';
include 'cnxpdo.php';
include 'cnx.php';
?>
<h2>Table maintenance</h2></br>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajoutermaintenance.php">AJOUTER</a>
    <div class="text-center mb-3">
        <form method="POST">
            <input type="date" name="date1">
            <input type="date" name="date2">
            <input type="submit" name="chercher" value="chercher">
        </form>
    </div>
</div>

<?php
$mysqli = new mysqli("localhost", "root", "", "db_maintenance");
$mysqli->set_charset("utf8");
$allemployeurs = $cnx->query("SELECT m.*, c.nom,c.prenom ,v.matricule,v.marque, eq.referance
from maintenance m, client c,voiture v , equipe eq 
where m.id_client = c.id_client and v.id_voiture=m.id_voiture and eq.id_equipe=m.id_equipe;");
if (isset($_POST['chercher'])) {
    // test
    $recherche1 = htmlspecialchars($_POST['date1']);
    $recherche2 = htmlspecialchars($_POST['date2']);
    // fin test
    $requete = "SELECT m.*, c.nom,c.prenom ,v.matricule,v.marque, eq.referance
            from maintenance m, client c,voiture v , equipe eq 
            where m.id_client = c.id_client and v.id_voiture=m.id_voiture 
            and eq.id_equipe=m.id_equipe and date_debut between  '$recherche1' AND '$recherche2';";
    $resultat = $mysqli->query($requete);
}else {

    $mysqli = new mysqli("localhost", "root", "", "db_maintenance");
    $mysqli->set_charset("utf8");
    $requete = "SELECT m.*, c.nom,c.prenom ,v.matricule,v.marque, eq.referance
            from maintenance m, client c,voiture v , equipe eq 
            where m.id_client = c.id_client and v.id_voiture=m.id_voiture 
            and eq.id_equipe=m.id_equipe;";
    $resultat = $mysqli->query($requete);
}
?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>NOM CLIENT</th>
            <th>PRENOM CLIENT</th>
            <th>MATRICULE</th>
            <th>MARQUE</th>
            <th>EQUIPE REFERANCE</th>
            <th>DATE DEBUT</th>
            <th>DATE FIN</th>
            <th>MONTANT</th>
            <th>ACTION</th>
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
                    <td>
                        <div class="aymxx">
                            <a class="btn btn-custom" href="modifiermaintenance.php?idmaintenance=<?php echo $ligne['id_maintenance'] ?>"><i class='bx bx-edit icon'></i></a>
                            <a class="btn btn-custom" href="supprimermaintenance.php?idmaintenance<?php echo $ligne['id_maintenance'] ?>"><i class='bx bx-car icon'></i></a>
                        </div>
                    </td>
                </tr>
            <?php }
            $mysqli->close(); ?>
        </tbody>
    </table>