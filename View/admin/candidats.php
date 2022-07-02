<?php
    session_start();
    session_regenerate_id();
    require "../../Controller/Adminn.php";
    if($_SESSION['role'] != 'admin'){
        header("Location: ../index.php");
    }
    $adminObject = new Adminn;
    $candidats = $adminObject->getAllCan();
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
          <a class="nav-link px-3" href="../../Controller/Adminn.php?q=logout">Deconnexion</a>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="dashboard.php">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="recruteures.php">
                  <span data-feather="users" class="align-text-bottom"></span>
                  recruteures
                </a>
              
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="candidats.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                    candidats
                  </a>
                </li>
              <li class="nav-item">
                <a class="nav-link " href="offres.php">
                  <span data-feather="layers" class="align-text-bottom"></span>
                  offres
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
            if (isset($_SESSION['message']) ){
              print'<div class="alert alert-success">'.$_SESSION['message'].'</div>';
              unset($_SESSION['message']);
              }
            ?>
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">prenom</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date de naissance</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                <?php
                  $i=0 ;
                  foreach ($candidats as $candidat ) {
                    $i++ ;
                    print ' 
                      <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$candidat->name.'</td>
                        <td> '.$candidat->family_name.' </td>
                        <td> '.$candidat->email.' </td>
                        <td> '.$candidat->date_de_naissance.' </td>
                        <td> 
                          <a onClick="return popUpDeleteCategory()" href="../../Controller/Adminn.php?id='.$candidat->email.'" class="btn btn-danger">Supprimer</a>
                        </td>
                      </tr>';
                  } 
                ?>
              </tbody>
            </table>  
          </div>  
        </main> 
      </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script > 
      function popUpDeleteCategory() {
        return confirm("Voulez-vous vraiment supprimer l'utilisateur ?");
        
      }
    </script>
  </body>
</html>
