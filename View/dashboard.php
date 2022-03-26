<?php
    include_once "template/header.php";
    include_once "../Controller/Jobs.php";
    include_once "../Controller/Candidatures.php";
    if($_SESSION['role'] != "recruteur") header("Location: index.php");
    $jobObject = new Jobs;
    $candidatureObject = new Candidatures;
    $jobs = $jobObject->getAllJobsPostedByUser($_SESSION['id']);
    if(isset($_GET['id'])){ 
      $candidatures = $candidatureObject->getCandidatures($_GET['id']);
    } 
?>
<?php include_once "template/post-job.php"; ?>
  <div class="content_offres">
    <aside class="offres">
      <?php
      flash("dashboard"); 
      foreach ($jobs as $job){ ?>
        <div class="card_offres">
          <div class="head_offres">
            <img src="images/black.jpg" alt="" />
            <h3>Company name</h3>
          </div>
          <a href="?id=<?php echo $job->job_id; ?>">
            <div class="details_offres">
              <h4><?php echo $job->title; ?></h4>
              <p><?php echo $job->type; ?></p>
            </div>
          </a>
        </div>
        <?php } ?>
      </aside>
      <?php 
      if(isset($candidatures)) { ?>
        <main class="main_candidate">
        <?php
        flash("candidature"); 
        foreach ($candidatures as $candidature){ ?>
            <div class="card_candidate"> 
              <div class="omar">
                <div>Username: <?php echo $candidature->user; ?></div>
                <div class="test" tabindex="1">See More</div>
                <div class="mega">
                  <div class="temp">Email: <?php echo $candidature->email; ?></div>
                  <div class="temp">Name: <?php echo $candidature->name; ?></div>
                  <div class="temp">Family Name: <?php echo $candidature->family_name; ?></div>
                </div>
              </div>
            </div>
          <?php } ?>
            </main> 
          <?php } ?>
    </div>    
    <?php include_once "template/footer.php"; ?>