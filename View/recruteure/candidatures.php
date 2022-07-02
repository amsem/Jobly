<?php 
    require "../template/header.php"; 
    require_once "../../Controller/Candidatures.php";
    if(!isset($_SESSION['role'])){
        header("Location: ../index.php");
      }else if($_SESSION['role'] != "recruteur"){
        header("Location: ../index.php");
      }
      $candidatureController = new Candidatures;
      $mesCandidatures = $candidatureController->getCandidatures($_SESSION['email']);
    
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
                    <?php
                    $i = 6; 
                    foreach($mesCandidatures as $can){ ?>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#Modal<?php echo $i ?>">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3 "><?php echo $can->nom." ".$can->prenom; ?></h5>
                                    
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
                                    <?php $_SESSION['user_email'] = $can->email; ?>
                                    <a class="dropdown-item" href="../../Controller/Candidatures.php?etat=on review">mettre en review</a>
                                    <a class="dropdown-item" href="../../Controller/Candidatures.php?etat=failed">failed</a>
                                    <a class="dropdown-item" href="../../Controller/Candidatures.php?etat=on interview">programmer une intervue</a>
                                    <a class="dropdown-item" href="../../Controller/Candidatures.php?etat=hired">hired</a> 
                                    <a class="dropdown-item" href="">messager</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Modal<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center" >
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                        <h5 class="mb-3 "><?php echo $can->nom." ".$can->prenom; ?></h5>
                                                    
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4 class=" ml-4 mb-3"><?php echo $can->title; ?></h4>
                                    <button class="btn btn-dark mb-3 mt-3">voir profil</button>
                                    <a class="btn btn-dark mb-3 mt-3" href="../cv/<?php echo $can->cv ;?> ">voir le CV</a>
                                    <button class="btn btn-dark mb-3 mt-3">lettre de motivation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i = $i + 1;
                } ?>
                    <a class="btn btn-primary py-3 px-5" href="">voir plus de candidatures</a>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Jobs End -->
<?php require "../template/footer.php"; ?>