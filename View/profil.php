<?php require "template/header.php"; 
    if(!isset($_SESSION['role'])){
      header("Location: index.php");
    }
    if($_SESSION['role'] =='candidateur'){
      require_once "../Model/Candidat.php";
      $candidatObject = new Candidat;
      $user = $candidatObject->checkIfUserExists($_SESSION['email']);
    }else{
      require_once "../Model/Recruteur.php";
      $recruteurObject = new Recruteur;
      $user = $recruteurObject->checkIfUserExists($_SESSION['email']);
    }
?>
<div class="container-fluid">
  <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">


      <div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
        <div class="card cardprofile p-4"> 
          <div class=" image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary"> 
              <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
            </button> 
            <span class="name mt-3"><?php echo $user->nom." ".$user->prenom; ?></span> 
            <div class=" d-flex mt-2"> 
              <?php if($_SESSION['role'] == 'candidateur'){
                echo '<a class="btn1 btn-dark" href="candidat/modifier.php">Edit Profile</a>';
              }else{
                echo '<a class="btn1 btn-dark" href="recruteure/modifier.php">Edit Profile</a>';
              } ?>
              
            </div>
            <div class="text mt-3"> 
              <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> 
            </div>
            <?php
                if(!isset($_SESSION['role']) || $_SESSION['role'] == "recruteur"){
                    echo '<span class="companyname mt-3">helloworld.org</span> 
                    <span class="tel mt-3">2137946578</span> ';
                }
            ?> 
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
              <span><i class="fa fa-twitter"></i></span>
              <span><i class="fa fa-facebook-f"></i></span> 
              <span><i class="fa fa-instagram"></i></span> 
              <span><i class="fa fa-linkedin"></i></span>
            </div> 
            <div class="skills gap-3 "> 
              <h4>skills</h4> 
              <div>py</div>
              <div>js</div>
              <div>html</div>
              <div>css</div>
              <div>latex</div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </nav>
  <div class="containerall row">
    <p class="titledash ">Votre tableau du bord :</p>
    <div class="containerdashboard ">
      
      <div class="card carddash" >
        <div class="card-body">
          <h5 class="card-title mb-4 pb-3 pt-3 mt-4 text-muted">Offres</h5>
          <?php if($_SESSION['role'] == 'candidateur'){
                echo '<h6 class="card-text mb-4 pb-2">Consulter tous les offres</h6>';
                print '
                <button class="btn btn-secondary mt-2">
            <a href="job-list.php" class="card-link text-white">Consulter</a>
          </button>
          ';
              }else{
                echo '<h6 class="card-text mb-4 pb-2">verifiez les offres que vous avez creez, supprimez ou bien ajoutez des autres selon vos besoins</h6>';
                print '
                <button class="btn btn-secondary mt-2">
            <a href="recruteure/offres.php" class="card-link text-white">verifiez</a>
          </button>
          ';
              } ?>

        </div>
      </div>
      <div class="card carddash" >
        <div class="card-body">
          <h5 class="card-title mb-4 pb-3 pt-3 mt-4 text-muted">candidatures</h5>
          <?php if($_SESSION['role'] == 'candidateur'){
                echo '<h6 class="card-text mb-4 pb-2">verifiez les candidatures que vous avez postuler</h6>';
                print '
                <button class="btn btn-secondary mt-2">
            <a href="candidat/candidatures.php" class="card-link text-white">verifiez</a>
          </button>
          ';
              }else{
                echo '<h6 class="card-text mb-4 pb-2">verifiez les candidatures que vous avez recu, eliminer les candidats ou bien les contactez pour une intervue.</h6></h6>';
                print '
                <button class="btn btn-secondary mt-2">
            <a href="recruteure/candidatures.php" class="card-link text-white">verifiez</a>
          </button>
          ';
              } ?>

        </div>
      </div>
      <div class="card carddash" >
        <div class="card-body">
          <h5 class="card-title mb-4 pb-3 pt-3 mt-4 text-muted">messages</h5>
          <h6 class="card-text mb-4 pb-2">verifiez les mesages que vous avez avez recu et contactez des candidats.</h6>
          <button class="btn btn-secondary mt-2">
            <a href="#" class="card-link text-white">verifiez</a>
          </button>

        </div>
      </div>
    </div>    
  </div>

</div>


<?php require "template/footer.php"; ?>