<?php 
    require_once("cnx.php");

    if(isset($_GET["idgarage"])){
        $idgarage=$_GET["idgarage"];
        $req=$con->prepare("delete from garage where id_garage=? ");
        $req->execute(array($idgarage));
    }
?>