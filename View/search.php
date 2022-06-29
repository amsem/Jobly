<?php
    if(isset($_POST['search'])){
        require "../Libraries/Search.php";
        $search = new Search;
        $term = $_POST['search'];
        if (isset($term)){
            $results = $search->search($term);
            
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
    require "template/header.php";
    require "template/login_signup.php";
?>
    <?php if(is_array($results)){ ?>
        <div class="container-xxl py-5">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">there is <?= count($results); ?> results</h1>
            <?php foreach ($results as $result) { ?>
                <div class="container">
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3"><?=$result->title;?></h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$result->place;?></span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?=$result->type;?></span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?=$result->salary;?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                <a class="btn btn-primary" href="job-detail.php?id=<?= $result->job_id; ?>">Apply Now</a>
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
    <?php }else{
        echo '<h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">'.$results.'</h1>';
    }
    require "template/footer.php";
    ?>