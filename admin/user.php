<?php include 'header.php'; ?>

<h2>Table Admin</h2></br>
<div class="ml-auto">
    <a class="btn btn-customm" href="ajouteruser.php">AJOUTER</a>
</div>
<?php
$mysqli = new mysqli("localhost", "root", "", "db_maintenance");
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM admin";
$resultat = $mysqli->query($requete); ?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <th>ID</th>
            <th>EMAIL</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            <?php
            while ($ligne = $resultat->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <?php echo $ligne['id_admin'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['email'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['nom'] ?>
                    </td>
                    <td>
                        <?php echo $ligne['prenom'] ?>
                    </td>
                    <td>
                        <div class="aymxx">
                            <a class="btn btn-custom" href="modifieruser.php?idadmin=<?php echo $ligne['id_admin'] ?>"><i class='bx bx-edit icon' ></i></a>
                            <a class="btn btn-custom" href="supprimeruser.php?idadmin=<?php echo $ligne['id_admin'] ?>"><i class='bx bx-car icon'></i></a>
                        </div>
                    </td>
                </tr>
            <?php }
            $mysqli->close(); ?>
        </tbody>
    </table>

