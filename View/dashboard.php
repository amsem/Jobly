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
  <div id="ourpostjob" class="modal">
      <div class="modal-background">
        <style type="text/css">
          .modal-background {
            opacity: 0;
          }
          .placeholder {
            color: white;
          }
        </style>
      </div>
      <div class="modal-content">
        <form action="../Controller/Jobs.php" method="post">
        <div class="box">
          <h2 class="title pl-1">post a job</h2>
          <div class="field">
            <label class="label">title</label>
            <div class="control">
              <input class="input" type="text" placeholder="job title" name="title" />
            </div>
          </div>
          <div class="field">
            <label class="label">workplace type</label>
            <div class="control">
              <input class="input" type="text" placeholder="eg:remote,..." name="place" required/>
            </div>
          </div>
          <div class="field">
            <label class="label">employement type</label>
            <div class="control">
              <input class="input" type="text" placeholder="full-time..." name="type" required/>
            </div>
          </div>
          <div class="field">
            <label class="label">Salary</label>
            <div class="control">
              <input class="input" type="number" placeholder="Salary" name="salary" required/>
            </div>
          </div>
          <div class="field">
            <label class="label">description </label>
            <div class="control">
              <textarea class="textarea" placeholder="description" name="desc" required></textarea>
            </div>
            <label class="label2"
              >keep it short and mention all the necessary skills.</label
            >
          </div>
          <input type="number" value="<?php echo $_SESSION['id']; ?>" name="userID" hidden/>
          <button class="modal-close is-large" aria-label="close"></button>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link has-background-black" name="submit">
                Submit
              </button>
            </div>
            <div class="control">
              <button class="button is-link is-light">Cancel</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  <div class="content_offres">
    <aside class="offres">
      <?php
      flash("dashboard"); 
      foreach ($jobs as $job){ ?>
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