<?php 
    require_once "c:/xampp/htdocs/dev.jobly.com/Libraries/Database.php";

    class Candidature{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addCandidature($data){
            print_r(($data));
            $this->db->query('INSERT INTO candidature (portfolio,coverletter,job_id, user_email) VALUES (:portfolio,:coverletter,:job_id, :user_email)');
            $this->db->bind(':portfolio', $data['portfolio']);
            $this->db->bind(':coverletter', $data['coverletter']);
            $this->db->bind(':job_id', $data['job_id']);
            $this->db->bind(':user_email', $data['user_email']);
        
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

        public function getMyCandidatures($email){
            $this->db->query('SELECT  etat,date FROM candidature WHERE user_email = :user_email');
            $this->db->bind(':user_email', $email);
        
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function checkIfAlreadyApplied($data){
            $this->db->query('SELECT * FROM candidature WHERE job_id = :jobID AND user_email = :userEmail');
            $this->db->bind(':jobID',$data['job_id']);
            $this->db->bind(':userEmail',$data['user_email']);
            $this->db->execute();
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        
        
    }

?>