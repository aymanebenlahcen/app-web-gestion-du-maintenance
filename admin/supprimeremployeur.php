<?php 
    require_once("cnx.php");

    if(isset($_GET["idemployeur"])){
        $idemployeur=$_GET["idemployeur"];
        $req=$con->prepare("delete from employeur where id_employeur=? ");
        $req->execute(array($idemployeur));
    }
?>