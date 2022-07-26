<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['departement']))
{
  $departement =$_POST['departement'];
  $tele =$_POST['tele'];
  $adresse =$_POST['adresse'];
   

  
      $query = "INSERT INTO fournisseur(departement,tele,adresse) VALUES('$departement','$tele','$adresse')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Fournisseur Bien Ajouter');</script>";
     echo " <script>
                    window.open('?page=AjouterFournisseur','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Fournisseur Non Ajouter');</script>";
       echo " <script>
                    window.open('?page=AjouterFournisseur','_self');
                  </script>";
    }
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Fournisseur</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterFournisseur">
                    <div class="form-group">
                      <label for="exampleInputName1">tele </label>
                      <input type="text" class="form-control" name="tele" id="exampleInputName1" placeholder="Tele">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Adresse </label>
                      <input type="text" class="form-control" name="adresse" id="exampleInputName1" placeholder="Adresse">
                    </div>
                    
                    
                   <div class="form-group">
                      <label for="exampleSelectGender">Departement</label>
                        <select class="form-control" name="departement" id="exampleSelectGender">
                          <option value="departement1">departement1</option>
                          <option value="departement2">departement2</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>