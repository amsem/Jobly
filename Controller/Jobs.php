<?php 
    require_once "../Model/Job.php";
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
            if($this->jobModel->postJob($data)){
                header("Location: ../view/jobs.php");
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
                die("Something went wrong");
            }
        }
    }
    $init = new Jobs;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])) $init->postJob();

    }
?>