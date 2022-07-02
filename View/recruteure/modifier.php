<?php 
 require "../template/header.php";
  //if(!isset($_SESSION['role'])){
    //header("Location: index.php");
  //}else if($_SESSION['role'] != "recruteur"){
    //header("Location: index.php");
  //}
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
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Prénom</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" >
  </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Date de Naissance</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nom d'entreprise</label>
  <input  type="text" class="form-control" id="exampleFormControlInput1">
  </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Numéro de Téléphone</label>
  <input  type="text" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mot De Passe</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" >
  </div>  
  <div class="field is-grouped">
    <button class="btn btn1 btn-secondary">Modifier</button>
    <button class="btn btn1 btn-secondary">Annuler</button>
  </div>
  </div>
</div>


<?php require "../template/footer.php"; ?>