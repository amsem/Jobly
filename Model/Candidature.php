<?php 
    require_once "../Libraries/Database.php";

    class Candidature{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addCandidature($data){
            $this->db->query('INSERT INTO candidature (job_id, user_id) VALUES (:job_id, :user_id)');
            $this->db->bind(':job_id', $data['job_id']);
            $this->db->bind(':user_id', $data['user_id']);
        
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function checkIfAlreadyApplied($data){
            $this->db->query('SELECT * FROM candidature WHERE job_id = :jobID AND user_id = :userID');
            $this->db->bind(':jobID',$data['job_id']);
            $this->db->bind(':userID',$data['user_id']);
            $this->db->execute();
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        
        
    }

?>