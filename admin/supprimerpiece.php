<?php 
    require_once("cnx.php");

    if(isset($_GET["idpiece"])){
        $idpiece=$_GET["idpiece"];
        $req=$con->prepare("delete from piece where id_piece=? ");
        $req->execute(array($idpiece));
    }
?>