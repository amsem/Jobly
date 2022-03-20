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
                'job_id' => trim($_POST['job_id']),
                'user_id' => trim($_POST['user_id']),
            ];
            if($this->candidatureModel->checkIfAlreadyApplied($data)){
                flash("applied", "You are already applied");
                header("Location: ../view/offres.php");
            }else{
                if($this->candidatureModel->addCandidature($data)){
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
                die("Something went wrong");
            }
        }

    }
    $init = new Candidatures;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Apply'])) $init->addCandidature();

    }
?>