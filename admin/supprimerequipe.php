<?php 
    require_once("cnx.php");
    require_once("cnxpdo.php");

    if(isset($_GET["idequipe"])){
        $idequipe=$_GET["idequipe"];
        $req=$con->prepare("delete from equipe where id_equipe= ? ");
        $req->execute(array($idequipe));
    }
?>