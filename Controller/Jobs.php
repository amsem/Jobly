<?php 
    require_once "../Model/Job.php";
    require_once "../Libraries/flash.php";
    class Jobs{
        private $jobModel;
        public function __construct(){
            $this->jobModel = new Job;
        }
        public function postJob(){
            $data = [
                'title' => trim($_POST['title']),
                'desc' => trim($_POST['desc']),
                'salary' => trim($_POST['salary']),
                'type' => trim($_POST['type']),
                'place' => trim($_POST['place']),
                'userID' => trim($_POST['userID'])
            ];
            
            if(empty($data['title']) || empty($data['desc']) || empty($data['salary']) || 
            empty($data['type']) || empty($data['place'])){
                flash("job", "Please fill out all inputs");
                header("Location: ../view/dashboard.php");
                die();
            }

            if(!preg_match("/^[0-9]*$/", $data['salary'])){
                flash("job", "Invalid number");
                header("Location: ../view/dashboard.php");
                die();
            }

            if($data['type'] != "full time" && $data['type'] != "part time"){
                flash("job", "Please enter full/part time in employement type");
                header("Location: ../view/dashboard.php");
                die();
            }

            if($data['place'] != "distanciel" && $data['place'] != "presentiel"){
                flash("job", "Please enter distanciel/presentiel in workplace type");
                header("Location: ../view/dashboard.php");
                die();
            }

            if($this->jobModel->postJob($data)){
                header("Location: ../view/dashboard.php");
            }else{
                die("Something went wrong");
            }
        }

        public function getAllJobs(){
            $jobs = $this->jobModel->getAllJobs();
            if($jobs){
                return $jobs;
            }else{
                die("Something went wrong");
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
                flash("dashboard", "You did't post any job");
                return Array();
            }
        }
    }
    $init = new Jobs;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])) $init->postJob();

    }
?>