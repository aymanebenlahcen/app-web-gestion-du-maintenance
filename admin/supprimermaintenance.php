<?php 
    require_once("cnx.php");

    if(isset($_GET["idmaintenance"])){
        $idmaintenance=$_GET["idmaintenance"];
        $req=$con->prepare("delete from maintenance where id_maintenance=? ");
        $req->execute(array($idmaintenance));
    }
?>