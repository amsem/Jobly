<?php 
 require "../template/header.php";
  if(!isset($_SESSION['role'])){
    header("Location: ../index.php");
  }else if($_SESSION['role'] != "recruteur"){
    header("Location: ../index.php");
  }
?>
<div class="postjob">
  <style type="text/css">
    .postjob{
      max-width: 80vw;
      margin: auto;
      margin-top: 70px;
    }
    .titlejob{
      margin-bottom: 40px;
    }
  </style>
  <h4 class="titlejob">modifier votre profile</h4>
  <?php if (isset($_SESSION['erreur']) ){
              print'<div class="alert alert-danger">'.$_SESSION['erreur'].'</div>';
              unset($_SESSION['erreur']);
            }else if(isset($_SESSION['message'])){
              print'<div class="alert alert-success">'.$_SESSION['message'].'</div>';
              unset($_SESSION['message']);
              }
  ?>
  <form action="../../Controller/Recruteurs.php" method="post">
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" name="nom">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Prénom</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" name="prenom">
  </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Date de Naissance</label>
    <input  type="date" class="form-control" id="exampleFormControlInput1" name="birthday">
  </div>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nom d'entreprise</label>
  <input  type="text" class="form-control" id="exampleFormControlInput1" name="entreprise">
  </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Numéro de Téléphone</label>
  <input  type="text" class="form-control" id="exampleFormControlInput1" name="tel">
  </div>  
  <div class="field is-grouped">
    <input type="submit" class="btn btn1 btn-secondary" name="modifier" value="Modifier">
    <button class="btn btn1 btn-secondary">Annuler</button>
  </div>
  <label>                    
      <a class="btn" href="modifier_pass.php" >Modifier mot de passe</button>

  </label>
  </form>
  </div>
</div>


<?php require "../template/footer.php"; ?>