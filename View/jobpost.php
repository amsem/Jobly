<?php 
  require "template/header.php";
  if(!isset($_SESSION['role'])){
    header("Location: index.php");
  }else if($_SESSION['role'] != "recruteur"){
    header("Location: index.php");
  }
  require_once "../Controller/Categories.php";
  $categoryObject = new Categories;
  $categories = $categoryObject->getCategories();
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
  <?php if (isset($_SESSION['erreur']) ){
              print'<div class="alert alert-danger">'.$_SESSION['erreur'].'</div>';
              unset($_SESSION['erreur']);
            }else if(isset($_SESSION['success'])){
              print'<div class="alert alert-success">'.$_SESSION['success'].'</div>';
              unset($_SESSION['success']);
              }
  ?>
  <form action="../Controller/Jobs.php" method="post">
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Titre</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Ex:developpeur web ">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Salaire</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" name="salary" placeholder="EX: 50000DA ">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Type</label>
    <select name="type" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option  selected>selectionner le type de contrat</option>
      <option value="part time">temps partiel</option>
      <option value="full time">temps plein</option>
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Categorie</label>
    <select name="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option  selected>selectionner la categorie d'offre</option>
      <?php foreach($categories as $category){ ?>
        <option value="<?php echo $category->nom; ?>"><?php echo $category->nom; ?></option>'
      <?php }?>
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Lieu</label>
    <input  type="text" class="form-control" id="exampleFormControlInput1" name="place" placeholder="Ex:Presentiel(Tizi-Ouzou)">
  </div>  
  <div class="field is-grouped">
    <input type="submit" name="publier" class="btn btn1 btn-secondary" value="publier">
    <input type="submit" name="annuler" class="btn btn1 btn-secondary" value="annuler">
  </div>
  </form>
  </div>
</div>


<?php require "template/footer.php"; ?>