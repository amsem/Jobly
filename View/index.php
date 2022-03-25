<?php 
  include_once "template/header.php";
  include_once "../Libraries/flash.php";
?>
    <div class="container1">
      <div class="columns">
        <div class="column is-6-desktop main-content">
          <div class="content main">
            <h2 class="title">Let's get the Job done!</h2>
            <p>find the perfect candidate for your Business with one click .</p>
            <?php if(!isset($_SESSION['id'])){ ?>  
            <div class="parentbtn">
            <button
                id="buy"
                class="js-modal-trigger button btn is-medium"
                data-target="modal-js-example"
              >
                Sign up now!
              </button>
            </div>
            <?php } ?>  
          </div>
        </div>
        <div class="column is-5-desktop image-principale">
          <img class="main-image" src="images/Group42.png" />
        </div>
      </div>
    </div>
    <div class="container3">
      <h2>How it works</h2>
      <img src="images/img2.svg" />
    </div>
    <div class="container4">
      <h2>Why our website</h2>
      <div class="columns is-2-tablet">
        <div class="column is-3-desktop is-3-tablet">
          <div class="card">
            <div class="card-content">
              <img class="icons" src="images/image34.png" />
              <h3 class="card-title">easy to use</h3>
              <div class="content">
                what makes us stand out is the easability of use, both for the
                recruiter and the employee
              </div>
            </div>
          </div>
        </div>
        <div class="column is-3-desktop is-3-tablet">
          <div class="card">
            <div class="card-content">
              <img class="icons" src="images/image33.png" />
              <h3 class="card-title">reliable</h3>
              <div class="content">
                our main purpose isnt to just establish a business , but also
                establish a community.
              </div>
            </div>
          </div>
        </div>
        <div class="column is-3-desktop is-3-tablet">
          <div class="card">
            <div class="card-content">
              <img class="icons" src="images/image32.png" />
              <h3 class="card-title">fast</h3>
              <div class="content">
                and beacuse we know how important time is for you, we designed
                our website so it can deliver results fast and in the most
                efficient way possible.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
    if(isset($_SESSION['role'])){
      if($_SESSION['role'] == 'recruteur') include_once "template/post-job.php"; 
    }else include_once "template/login-register.php"; 
    ?>
    <div class="container2">
      <div class="columns">
        <div class="column content is-medium has-text-black">
          <h2>Find candidates according to category</h2>
          <p class="des ml-3 mr-0 pr-0">
            to make it easy for you to browse through the differnet listings, we
            have seperated them through different categories , let’s check some
            of them out !
          </p>
        </div>
        <div class="column">
          <img class="table" src="images/Group47.png" />
        </div>
      </div>
    </div>
    <div class="container5">
      <div class="contactus">
        <h2 class="title pl-1">contact us</h2>
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input
              class="input"
              type="text"
              placeholder="enter your name here"
            />
          </div>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" type="email" placeholder="enter your Email" />
          </div>
        </div>
        <div class="field">
          <label class="label">Message</label>
          <div class="control">
            <textarea
              class="textarea"
              placeholder="enter the message here"
            ></textarea>
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php include_once "template/footer.php"; ?>