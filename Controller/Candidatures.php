<?php
    require_once "../Model/Candidature.php";
    require_once "../Libraries/flash.php";
    class Candidatures{
        private $candidatureModel;
        public function __construct(){
            $this->candidatureModel = new Candidature;
        }

        public function addCandidature(){
            $data = [
                'job_id' => trim($_SESSION['job_id']),
                'user_id' => trim($_SESSION['id'])
            ];
            if($this->candidatureModel->checkIfAlreadyApplied($data)){
                flash("applied", "You are already applied");
                unset($_SESSION['job_id']);
                header("Location: ../view/offres.php");
            }else{
                if($this->candidatureModel->addCandidature($data)){
                    unset($_SESSION['job_id']);
                    header("Location: ../view/index.php");
                }else{
                    die("Something went wrong");
                }
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

    }
    $init = new Candidatures;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Apply'])) $init->addCandidature();

    }
?>