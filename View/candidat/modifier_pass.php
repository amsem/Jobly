<?php 
 require "../template/header.php";
 if(!isset($_SESSION['role'])){
  header("Location: ../index.php");
}else if($_SESSION['role'] != "candidateur"){
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
  <?php if (isset($_SESSION['error']) ){
              print'<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
              unset($_SESSION['error']);
            }else if(isset($_SESSION['message'])){
              print'<div class="alert alert-success">'.$_SESSION['message'].'</div>';
              unset($_SESSION['message']);
              }
  ?>
  <form action="../../Controller/Candidats.php" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Ancien mot de passe</label>
        <input  type="password" class="form-control" id="exampleFormControlInput1" name="oldPass">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nouveau mot de passe</label>
        <input  type="password" class="form-control" id="exampleFormControlInput1" name="newPass">
    </div>  
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Confirmer mot de passe</label>
        <input  type="password" class="form-control" id="exampleFormControlInput1" name="confirmPass">
    </div>   
    <div class="field is-grouped">
        <input type="submit" class="btn btn1 btn-secondary" name="pass" value="modifier">
        <button class="btn btn1 btn-secondary">Annuler</button>
    </div>
  </form>
  </div>
</div>


<?php require "../template/footer.php"; ?>