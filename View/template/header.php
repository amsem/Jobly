<?php 
  session_start();
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
          <a class="navbar-brand"
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
          <a class="navbar-item js-modal-trigger" data-target="modal-js-example"
            >register</a
          >
          <a
            class="navbar-item js-modal-trigger"
            data-target="modal-js-example2"
            >login</a
          >
          <a class="navbar-item">offers</a>
          <a class="navbar-item">contact us</a>
        </div>
      </div>
    </nav>