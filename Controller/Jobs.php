<?php 
    require_once "c:/xampp/htdocs/dev.jobly.com/Model/Job.php";
    class Jobs{
        private $jobModel;
        public function __construct(){
            $this->jobModel = new Job;
        }
        public function postJob(){
            session_start();
            $data = [
                'title' => trim($_POST['title']),
                'desc' => trim($_POST['desc']),
                'salary' => trim($_POST['salary']),
                'type' => trim($_POST['type']),
                'place' => trim($_POST['place']),
                'userEMAIL' => trim($_SESSION['email']),
                'category' => trim($_POST['category'])
            ];
            if(empty($data['title']) || empty($data['desc']) || empty($data['salary']) || 
            empty($data['type']) || empty($data['place'])|| empty($data['category'])){
                $_SESSION['erreur'] = "Please fill out all inputs";
                header("Location: ../view/jobpost.php");
                die();
            }

            if(!preg_match("/^[0-9]*$/", $data['salary'])){
                $_SESSION['erreur'] = "Invalid number";
                header("Location: ../view/jobpost.php");
                die();
            }

            if($data['type'] != "full time" && $data['type'] != "part time"){
                $_SESSION['erreur'] = "Please enter full/part time in employement type";
                header("Location: ../view/jobpost.php");
                die();
            }

            if($this->jobModel->postJob($data)){
                $_SESSION['success'] = "L'offre partage avec succes";
                header("Location: ../view/jobpost.php");
            }else{
                die("Something went wrong");
            }
        }

        public function getAllJobs(){
            $jobs = $this->jobModel->getAllJobs();
            if($jobs){
                return $jobs;
            }else{
                return Array();
            }
        }

        public function getJobDetails($id){
            $job = $this->jobModel->getJobDetails($id);
            if($job){
                return $job;
            }else{
                die("Something went wrong");
            }
        }

        public function getAllJobsPostedByUser($id){
            $jobs = $this->jobModel->getAllJobsPostedByUser($id);
            if($jobs){
                return $jobs;
            }else{
                // flash("dashboard", "You did't post any job");
                return Array();
            }
        }

        public function deleteJobPostedByUser(){
            session_start();
            $id = $_GET['job'];
            if($this->jobModel->deleteJobPostedByUser($id)){
                $_SESSION['message'] = "Job deleted successfully";
                header("Location: ../view/recruteure/offres.php");
            }
        }
    }
    $init = new Jobs;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['publier'])) $init->postJob();
    }else{
        if(isset($_GET['job'])) $init->deleteJobPostedByUser();
    }
?>