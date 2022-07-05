<?php 
    require "template/header.php"; 

    require_once "../Controller/Categories.php";
    require_once "../Controller/Jobs.php";
    $jobObject = new Jobs;
    $jobs = $jobObject->getAllJobs();
    $categoryObject = new Categories;
    $categories = $categoryObject->getCategories();
  ?>
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Trouver le meilleur offre que vous convient</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">chercher des offres de travail , postuler et connecter avec les recruteurs</p>
                                    <a href="job-list.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">trouver un offre</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">trouver
                                    le meilleur candidat qui vous convient</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">publier des offres, et selectionner des candidats et programmer des intervues</p>
                                    <a href="job-list.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">trouver un offre</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Modal -->
            <?php require "template/login_signup.php"; ?>
        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0" />
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0" >
                                    <?php foreach($categories as $cat){
                                        print '<option value="'.$cat->nom.'">'.$cat->nom.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">rechercher</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->


        <!-- Category Start -->
        <div class="container-xxl py-5" id="category">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Nos Categories</h1>
                <div class="row g-4">
                    <?php foreach($categories as $cat){
                        print '<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <a class="cat-item rounded p-4" href="search.php?cat='.$cat->nom.'">
                                        <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                                        <h6 class="mb-3">'.$cat->nom.'</h6>
                                    </a>
                                </div>';
                    } ?>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center" id="aboutUs">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">On vous aide a trouver le meilleur offre de travail et le meilleur candidat</h1>
                        <p class="mb-4">cette plateforme vous aide a publier des offres d'emploi, et a trouver le meilleur candidat qui convienne ce poste seulemenet en auelaues clicks:</p>
                        <p><i class="fa fa-check text-primary me-3"></i>simplicité d'interface</p>
                        <p><i class="fa fa-check text-primary me-3"></i>facile a utiliser</p>
                        <p><i class="fa fa-check text-primary me-3"></i>messagerie pour faciliter le contact</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">listes des offres</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                        <?php foreach ($jobs as $job){ ?>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?= $job->title; ?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $job->place; ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?= $job->type; ?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?= $job->salary; ?> DZD</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="job-detail.php?id=<?= $job->job_id;?>">Postuler</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $job->date; ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            <a class="btn btn-primary py-3 px-5" href="job-list.php">trouvez plus d'offres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->



<?php require "template/footer.php"; ?>