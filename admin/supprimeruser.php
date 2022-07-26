<?php 
    require_once("cnx.php");

    if(isset($_GET["idadmin"])){
        $idadmin=$_GET["idadmin"];
        $req=$con->prepare("delete from admin where id_admin=? ");
        $req->execute(array($idadmin));
    }
?>