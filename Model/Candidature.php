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
        
        
    }

?>