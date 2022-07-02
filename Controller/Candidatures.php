<?php
    require_once "c:/xampp/htdocs/dev.jobly.com/Model/Candidature.php";
    require "c:/xampp/htdocs/dev.jobly.com/Libraries/Mail.php";

    class Candidatures{
        private $candidatureModel;
        public function __construct(){
            $this->candidatureModel = new Candidature;
        }

        public function addCandidature(){
            session_start();
            $data = [
                'portfolio' => trim($_POST['portfolio']),
                'coverletter' => trim($_POST['coverletter']),
                'job_id' => trim($_SESSION['job_id']),
                'user_email' => trim($_SESSION['email']) ,
                'rec_email' =>  trim($_POST['rec'])
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

        public function getCandidatures($email){
            $candidatures = $this->candidatureModel->getCandidatures($email);
            if($candidatures){
                return $candidatures;
            }else{
                // flash("candidature", "There isn't any candidate");
                return Array();
            }
        }

        public function getUserCandidatures($email){
            $candidatures = $this->candidatureModel->getMyCandidatures($email);
            if($candidatures){
                return $candidatures;
            }else{
                $_SESSION['error'] = "There isn't any candidate";
                return Array();
            }
        }

        public function updateState(){
            session_start();
            $data = [
                'email' => trim($_SESSION['user_email']),
                'etat' => trim($_GET['etat'])
            ];
            if($data['etat'] == "on review") {
                mailTo($data['email'],"Dossier en traitement","Votre dossier est en cours de traitement");
            }
            if($data['etat'] == "failed") {
                mailTo($data['email'],"Dossier en traitement","Votre dossier echoue");
            }
            if($data['etat'] == "on interview") {
                mailTo($data['email'],"Dossier en traitement","vous avez ete selectionne pour un interview");
            }
            if($data['etat'] == "hired") {
                mailTo($data['email'],"Dossier en traitement","Votre avez ete employee");
            }
            if($this->candidatureModel->updateState($data)){
                header("Location: ../view/recruteure/candidatures.php");
            }
        }

    }
    $init = new Candidatures;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Apply'])) $init->addCandidature();
    }else{
        if(isset($_GET['etat'])) $init->updateState();
    }
?>