<?php 
<<<<<<< HEAD
  require "template/header.php";
  // if(!isset($_SESSION['role'])){
  //   header("Location: index.php");
  // }else if($_SESSION['role'] != "recruteur"){
  //   header("Location: index.php");
  // }
=======
 require "template/header.php";
  //if(!isset($_SESSION['role'])){
    //header("Location: index.php");
  //}else if($_SESSION['role'] != "recruteur"){
    //header("Location: index.php");
  //}
>>>>>>> 42a6628b1345b0cb04d50dd3d4066aebef54c4c8
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
  <h4 class="titlejob">Publiez un offre de travail</h4>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Titre</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex:developpeur web ">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Salaire</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" placeholder="EX: 50000DA ">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Type</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>selectionner le type de contrat</option>
      <option value="1">part-time</option>
      <option value="2">cdd</option>
      <option value="3">Three</option>
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Categorie</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>selectionner la categorie d'offre</option>
      <option value="1">part-time</option>
      <option value="2">cdd</option>
      <option value="3">Three</option>
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Lieu</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex:Presentiel(Tizi-Ouzou)">
  </div>  
  <div class="field is-grouped">
    <button class="btn btn1 btn-secondary">publier</button>
    <button class="btn btn1 btn-secondary">annuler</button>
  </div>
  </div>
</div>


<?php require "template/footer.php"; ?>