<?php
    session_start();
    session_regenerate_id();
    require "../../Controller/Candidatures.php";
    if($_SESSION['role'] != 'candidateur' ){
        header("Location: ../index.php");
    }
    $candidatObject = new Candidatures;
    $candidatures = $candidatObject->getMyCandidatures($_SESSION['email']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace Admin ! </title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">JobLy</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="../../Controller/Candidats.php?q=logout">Deconnexion</a>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="../dashboard.php">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="candidatures.php">
                  <span data-feather="file" class="align-text-bottom"></span>
                  Mes candidatures
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                  Mon profile
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                  Modifier mot de passe
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des candidateures</h1>
          </div>
          <div>
            <?php
            if (isset($_SESSION['error']) ){
              print'<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
              unset($_SESSION['error']);
              }
            ?>
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titre d'emplois</th>
                  <th scope="col">Nom d'entreprise</th>
                  <th scope="col">Etat</th>
                  <th scope="col">Date de candidature</th>
                </tr>
              </thead>
              <tbody> 
                <?php
                  $i=0 ;
                  foreach ($candidatures as $candidature ) {
                    $i++ ;
                    print ' 
                      <tr>
                        <th scope="row">'.$i.'</th>
                        <td> test </td>
                        <td> test </td>
                        <td> '.$candidature->etat.' </td>
                        <td> '.$candidature->date.' </td>
                      </tr>';
                  } 
                ?>
              </tbody>
            </table>  
          </div>  
        </main> 
      </div>
    </div>
  </body>
</html>
