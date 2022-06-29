<?php
    session_start();
    require_once "c:/xampp/htdocs/dev.jobly.com/Model/Candidature.php";
    class Candidatures{
        private $candidatureModel;
        public function __construct(){
            $this->candidatureModel = new Candidature;
        }

        public function addCandidature(){
            $data = [
                'portfolio' => trim($_POST['portfolio']),
                'coverletter' => trim($_POST['coverletter']),
                'job_id' => trim($_SESSION['job_id']),
                'user_email' => trim($_SESSION['email'])    
            ];
            $job = $_SESSION['job_id'];
            unset($_SESSION['job_id']);
            if($this->candidatureModel->checkIfAlreadyApplied($data)){
                $_SESSION['error'] = "You are already applied";
                header("Location: ../view/job-detail.php?id=$job");
            }else if($this->candidatureModel->addCandidature($data)){
                $_SESSION['message'] = "Applied successfully";
                header("Location: ../view/job-detail.php?id=$job");
            }else{
                header("Location: ../view/job-detail.php?id=$job");
                die();
            }
        }

        public function getCandidatures($id){
            $candidatures = $this->candidatureModel->getCandidatures($id);
            if($candidatures){
                return $candidatures;
            }else{
                flash("candidature", "There isn't any candidate");
                return Array();
            }
        }

        public function getMyCandidatures($email){
            $candidatures = $this->candidatureModel->getMyCandidatures($email);
            if($candidatures){
                return $candidatures;
            }else{
                $_SESSION['error'] = "There isn't any candidate";
                return Array();
            }
        }

    }
    $init = new Candidatures;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Apply'])) $init->addCandidature();
    }
?>