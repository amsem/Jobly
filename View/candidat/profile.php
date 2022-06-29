<?php
   // session_start();
    //session_regenerate_id();
    //if($_SESSION['role'] != 'candidateur' ){
      //  header("Location: ../index.php");
   // }
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
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                  Mon profile
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modifier.php">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                  Modifier mot de passe
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container-xl px-4 mt-4">
            <?php
                if (isset($_SESSION['message']) ){
                    print'<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error']) ){
                  print'<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
                  unset($_SESSION['error']);
              }
            ?>
            <div class="row">
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form action="../../Controller/Candidats.php" method="POST" enctype="multipart/form-data">
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nom</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="nom">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Prenom</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="prenom">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="email">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="cv">CV</label>
                                        <input class="form-control" id="cv" type="file" name="cv">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Enter your birthday">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" name="modifier">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>  
      </div>
    </div>
  </body>
</html>
