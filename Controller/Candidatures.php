<?php
    require_once "../Model/Candidature.php";
    class Jobs{
        private $CandidatureModel;
        public function __construct(){
            $this->CandidatureModel = new Candidature;
        }

        public function addCandidature(){
            $data = [
                'job_id' => trim($_POST['job_id']),
                'user_id' => trim($_POST['user_id']),
            ];
            if($this->CandidatureModel->addCandidature($data)){
                header("Location: ../view/");
            }else{
                die("Something went wrong");
            }
        }
    }
    $init = new Jobs;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Apply'])) $init->addCandidature();

    }
?>