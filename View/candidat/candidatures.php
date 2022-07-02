<?php 
    require "../template/header.php"; 
    require_once "../../Controller/Candidatures.php";
    $candidatureController = new Candidatures;
    $mesCandidatures = $candidatureController->getUserCandidatures($_SESSION['email']);;
    
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">candidatures</h2>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <?php foreach($mesCandidatures as $candidature){ ?>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center" >
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3 "><?php echo $candidature->title ?></h5>
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <button type="button" class="btn  btn-secondary dropdown-toggle me-3" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>  
                                <style type="text/css">
                                            .dropdown-toggle::after {
                                                content: none;
                                                }
                                </style>  
                                <div class="dropdown-menu" >
                                    <a class="dropdown-item" href="">Voir Status</a>
                                    <a class="dropdown-item" href="">Supprimer</a>
                                    <a class="dropdown-item" href="">Voir Le Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <a class="btn btn-primary py-3 px-5" href="">Voir Plus De Candidatures</a>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Jobs End -->
<?php require "../template/footer.php"; ?>