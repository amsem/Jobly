<?php 
    require_once "../Libraries/Database.php";

    class Job{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function postJob($data){
            $this->db->query('INSERT INTO jobs (title, job_desc, salary, type, place, user_id) VALUES (:title, :desc, :salary, :type, :place, :userID)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':desc', $data['desc']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':place', $data['place']);
            $this->db->bind(':userID', $data['userID']);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllJobs(){
            $this->db->query('SELECT * FROM jobs ORDER BY job_id DESC');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function getJobDetails($id){
            $this->db->query('SELECT * FROM jobs WHERE job_id = :id');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }
        
        public function getAllJobsPostedByUser($id){
            $this->db->query('SELECT * FROM jobs WHERE user_id = :id ORDER BY job_id DESC');
            $this->db->bind(':id',$id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }
    }

?>