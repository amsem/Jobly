<?php 
    require_once "c:/xampp/htdocs/dev.jobly.com/Libraries/Database.php";

    class Job{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function postJob($data){
            $this->db->query('INSERT INTO jobs (title, job_desc, salary, type, place, user_email,category) VALUES (:title, :desc, :salary, :type, :place, :userEMAIL,:category)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':desc', $data['desc']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':place', $data['place']);
            $this->db->bind(':userEMAIL', $data['userEMAIL']);
            $this->db->bind(':category', $data['category']);
            
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
        
        public function getAllJobsPostedByUser($email){
            $this->db->query('SELECT * FROM jobs WHERE user_email = :email ORDER BY job_id DESC');
            $this->db->bind(':email',$email);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function deleteJobPostedByUser($id){
            $this->db->query('DELETE FROM jobs WHERE job_id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function modifyOffre($id,$data){
            $this->db->query('UPDATE jobs jobs SET job_desc=:job_desc,salary=:salary,type=:type,place=:place,category=:category WHERE job_id=:id');
            $this->db->bind(':id',$id);
            $this->db->bind(':job_desc',$data['job_desc']);
            $this->db->bind(':salary',$data['salary']);
            $this->db->bind(':type',$data['type']);
            $this->db->bind(':place',$data['place']);
            $this->db->bind(':category',$data['category']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>