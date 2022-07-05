<?php 
  session_start();
  session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jobly</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
     <link href="../css/style.css" rel="stylesheet">
    <link href="../css/modal.css" rel="stylesheet">
    <link href="./css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/message.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Chargement...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center ">
                <h1 class="text-primary">Jobly</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ">

                    <form class="input-group rounded  "action='search.php' method='post'>
                        <input type="search" class="form-control rounded" name="search" placeholder="rechercher des offres" aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </form>

                    <a href="#aboutUs" class="nav-item nav-link pr-4">About Us</a>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] != "admin"){
                        echo '<a class="nav-item nav-link " href="profil.php">
                            dashboard
                        </a>';
                        if($_SESSION['role'] == "candidateur"){
                            echo '<a class="nav-item nav-link " href="../Controller/Candidats.php?q=logout">
                            Se deconnecter
                        </a>';
                        }else{
                            echo '<a class="nav-item nav-link " href="../Controller/Recruteurs.php?q=logout">
                            Se deconnecter
                        </a>';
                        }
                    }else{
                        echo '<a class="nav-item nav-link " role="button" data-bs-toggle="modal" data-bs-target="#Modal2">
                        inscrire
                    </a>';
                    echo '<a class="nav-item nav-link " role="button" data-bs-toggle="modal" data-bs-target="#Modal1">
                    Se Connecter
                </a>';
                    } ?>
                
                    <a href="contact.php" class="nav-item nav-link " id="ContactUs">Nous Contacter</a>
                    <?php
                        if(!isset($_SESSION['role']) || $_SESSION['role'] == "recruteur"){
                            echo '<a href="../View/jobpost.php" class="btn btn-primary rounded-0 px-lg-5 pb-0 mb-0  d-none d-lg-block">Publier Une Offre</a>';
                        }
                    ?>
                   
                </div>
            </div>
        </nav>
        <!-- Navbar End -->