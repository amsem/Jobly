<?php 
    require "../template/header.php"; 
    include_once "../../Controller/Jobs.php";
    if(!isset($_SESSION['role'])){
        header("Location: ../index.php");
      }else if($_SESSION['role'] != "recruteur"){
        header("Location: ../index.php");
      }
    $jobObject = new Jobs;
    $jobs = $jobObject->getAllJobsPostedByUser($_SESSION['email']);
?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">offres</h2>
        <?php 
            if(isset($_SESSION['message'])){
                print'<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
                }
        ?>
        <a class="btn btn-secondary" href="../jobpost.php">creer des offres</a>            
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <?php 
                    $i = 6;
                    foreach($jobs as $job){ 
                        ?>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#Modal<?php echo $i ?>">
                                <img class="flex-shrink-0 img-fluid border rounded" src="../img/<?php echo $_SESSION['photo']; ?>" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3 "><?php echo $job->title; ?></h5>
                                    
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
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $i ?>">voir details</a>
                                    <a class="dropdown-item" href="../../Controller/Jobs.php?job=<?php echo $job->job_id; ?>">supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Modal<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <img class="flex-shrink-0 img-fluid border rounded" src="../img/<?php echo $_SESSION['photo']; ?>" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                            <h5 class="mb-3 "><?php echo $job->title; ?></h5>
                                        
                            </div>
                        
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="postjob">
                            <style type="text/css">
                                .postjob{
                                max-width: 80vw;
                                margin: auto;
                                margin-top: 70px;
                                }
                                .titlejob{
                                margin-bottom: 40px;
                                }
                            </style>
                            <h4 class="titlejob"><?php echo $job->title; ?></h4>

                            <div class="mb-3">
                                <p><?php echo $job->job_desc; ?></p>
                            </div>
                            <div class="mb-3">
                                <p><?php echo $job->salary; ?></p>
                            </div>
                            <div class="mb-3">
                                <p><?php echo $job->type; ?></p>
                            </div>
                            <div class="mb-3">
                                <p><?php echo $job->place; ?></p>
                            </div>  

                            </div>
                            <a class="btn btn-secondary" href="modifier_offre.php?id=<?php echo $job->job_id; ?>">
                                modifier
                            </a>
                            <button class="btn btn-dark">
                                annuler
                            </button>
                        </div>

                    </div>
                </div>
            </div>
                    <?php
                    $i += 1;
                 } ?>
                    <a class="btn btn-primary py-3 px-5" href="">voir plus d'offres</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "../template/footer.php"; ?>