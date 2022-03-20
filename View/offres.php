<?php
    include_once "template/header.php";
    include_once "../Controller/Jobs.php";
    include_once "../Libraries/flash.php";
    $test = new Jobs;
    $jobs = $test->getAllJobs();
    if(isset($_GET['id'])){ 
        $job_det = $test->getJobDetails($_GET['id']);
    } 
?>
    <div class="content_offres">
      <aside class="offres">
      <?php foreach ($jobs as $job){ ?>
        <div class="card_offres">
          <div class="head_offres">
            <img src="images/black.jpg" alt="" />
            <h3>charika name</h3>
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
      flash('applied');
      if(isset($job_det)){ ?>
      <main class="main_offres">
      <form action="../Controller/Candidatures.php" method="post">
        <div class="company_offres">
        <span>Charika name</span>
          <p>Location</p>
        </div>
        <div class="job_desc">
            <span>Job Description</span>
            <p class="description">
            <?php echo $job_det->job_desc; ?>
          </p>
          <div class="time">
            <p><?php echo $job_det->type; ?></p>
          </div>
          <div class="type">
            <p><?php echo $job_det->place; ?></p>
          </div>
          <div class="salaire">
            <p><?php echo $job_det->salary; ?>DA</p>
          </div>
          <?php 
            echo'<input type="text" name="job_id" value="'.$_GET['id'].'" hidden>';
            echo'<input type="text" name="user_id" value="'.$_SESSION['id'].'" hidden>';
            if($_SESSION['role'] == "candidateur" ){ ?>
              <button class="button is-link has-background-black" name="Apply">
                Apply now
              </button>
          <?php } ?>
        </div>
      </form>
      </main>
      <?php } ?>
    </div>
  <?php include_once "template/footer.php"; ?>
