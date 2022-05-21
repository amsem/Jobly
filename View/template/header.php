<?php 
  session_start();
  session_regenerate_id()
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/bouncer.css" />
    <link rel="stylesheet" type="text/css" href="css/container4.css" />
    <link rel="stylesheet" type="text/css" href="css/container1.css" />
    <link rel="stylesheet" type="text/css" href="css/container2.css" />
    <link rel="stylesheet" type="text/css" href="css/container3.css" />
    <link rel="stylesheet" type="text/css" href="css/container5.css" />
    <link rel="stylesheet" type="text/css" href="css/offres.css" />
    <link rel="stylesheet" type="text/css" href="css/tocand.css" />
    <title>bienvenu!</title>
  </head>
  <body>
    <!--bouncing balls-->
    <div class="bouncer">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <nav
      class="navbar content is-medium mb-0 p-0"
      role="navigation"
      aria-label="main navigation"
    >
      <div class="navbar-brand">
        <a
          role="button"
          class="navbar-burger"
          aria-label="menu"
          aria-expanded="false"
          data-target="navbarBasicExample"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div class="navbar-menu" id="navbarBasicExample">
        <div class="navbar-start">
          <a class="navbar-brand" href="index.php"
            ><img class="logo mr-5 mt-5 ml-3" src="images/Group46.png"
          /></a>
          <div class="srch mt-5">
            <input
              class="searchbar"
              type="search"
              placeholder="Search here for offers"
              aria-label="Search"
            />
            <button class="btn2 pt-3" type="submit">Search</button>
          </div>
        </div>
        <div class="navbar-end">
          <?php if(isset($_SESSION['id'])){
            if($_SESSION['role'] == "recruteur" ) echo '<button class="js-modal-trigger button btn is-medium" data-target="ourpostjob">post a job</button>'; 

            echo '<a class="navbar-item" href="../Controller/Candidats.php?q=logout">logout</a>';
          }else{ ?>
          <a class="navbar-item js-modal-trigger" data-target="modal-js-example"
            >register</a
          >
          <a
            class="navbar-item js-modal-trigger"
            data-target="modal-js-example2"
            >login</a
          >
          <?php } ?>
          <a class="navbar-item" href="offres.php">offers</a>
          <?php
           if(isset($_SESSION['role'])){
              if($_SESSION['role'] == "candidateur") echo '<div class="navbar-item" >'.$_SESSION['name'].'</div>';
              else if($_SESSION['role'] == "recruteur") echo '<a class="navbar-item" href="dashboard.php">'.$_SESSION['name'].'</a>';
           }
              else echo "<a class='navbar-item'>contact us</a>";
          ?>
          
        </div>
      </div>
    </nav>