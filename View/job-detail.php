<?php 
    require "template/header.php"; 
    include_once "../Controller/Jobs.php";
    if(isset($_GET['id'])){ 
        $jobObject = new Jobs;
        $job_det = $jobObject->getJobDetails($_GET['id']);
    }else{
        header("Location: job-list.php");
    }
    if(!isset($_SESSION['email'])) require "template/login_signup.php";
?>
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?= $job_det->title; ?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?= $job_det->type; ?></span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?= $job_det->salary; ?> DZD</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p><?= $job_det->job_desc; ?></p>
                        </div>
        
                        <div>
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
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form action="../Controller/Candidatures.php" method="POST">
                                <?php $_SESSION['job_id'] = $_GET['id']; ?>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Portfolio Website" name="portfolio">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <textarea class="form-control" rows="5" placeholder="Coverletter" name="coverletter"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" name="Apply">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: 01 Jan, 2045</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?= $job_det->type; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?= $job_det->salary; ?> DZD</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: New York, USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "template/footer.php"; ?>