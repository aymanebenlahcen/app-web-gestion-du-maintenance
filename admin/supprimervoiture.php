<?php 
    require_once("cnx.php");

    if(isset($_GET["idvoiture"])){
        $idvoiture=$_GET["idvoiture"];
        $req=$con->prepare("delete from voiture where id_voiture=? ");
        $req->execute(array($idvoiture));

    }
?>