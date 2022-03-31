<?php 
    require_once "../Libraries/Database.php";

    class Candidature{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addCandidature($data){
            $this->db->query('INSERT INTO candidature (job_id, user_id,cv) VALUES (:job_id, :user_id, :cv)');
            $this->db->bind(':job_id', $data['job_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':cv', $data['cv']);
        
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getCandidatures($id){
            $this->db->query('SELECT u.user,u.name,u.family_name,u.email,c.cv FROM candidature c INNER JOIN users u ON c.user_id = u.user_id WHERE c.job_id = :job_id');
            $this->db->bind(':job_id', $id);
        
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
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