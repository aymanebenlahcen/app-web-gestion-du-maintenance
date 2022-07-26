"SELECT * FROM maintenance WHERE date_debut BETWEEN '$date1' AND '$date2' order by id_maintenance desc"



<?php
include 'cnxpdo.php';
include 'cnx.php';
$allemployeurs = $cnx->query('SELECT * from employeur order by id_employeur desc ');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allemployeurs = $cnx->query('SELECT nom from employeur where nom like "%' . $recherche . '%" order by id_employeur desc');
}
?>
<form method="get">
    <input type="search" name="s" placeholder="recherche un employeur" autocomplete="off">
    <input type="submit" name="envoyer">
</form>

<section class="afficher_utilisateur">
    <?php
    if ($allemployeurs->rowCount() > 0) {
        while ($employeur = $allemployeurs->fetch()) {
    ?>
            <p><?= $employeur['nom']; ?></p>
        <?php
        }
    } else {
        ?>
        <p>aucun employeur trouver</p>
    <?php
    }
    ?>

</section>