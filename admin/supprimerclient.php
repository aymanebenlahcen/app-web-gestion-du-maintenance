<?php 
    require_once("cnx.php");

    if(isset($_GET["idclient"])){
        $idclient=$_GET["idclient"];
        $req=$con->prepare("delete from client where id_client=? ");
        $req->execute(array($idclient));
    }
?>