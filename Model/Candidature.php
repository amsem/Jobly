<?php 
    require_once "c:/xampp/htdocs/dev.jobly.com/Libraries/Database.php";

    class Candidature{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addCandidature($data){
            print_r(($data));
            $this->db->query('INSERT INTO candidature (portfolio,coverletter,job_id, user_email,recruteur_email) VALUES (:portfolio,:coverletter,:job_id, :user_email,:rec)');
            $this->db->bind(':portfolio', $data['portfolio']);
            $this->db->bind(':coverletter', $data['coverletter']);
            $this->db->bind(':job_id', $data['job_id']);
            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':rec', $data['rec_email']);
        
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getCandidatures($email){
            $this->db->query('SELECT u.nom,u.prenom,u.email,u.cv,jobs.title FROM candidature c INNER JOIN candidat u ON c.user_email= u.email INNER JOIN jobs ON jobs.job_id = c.job_id WHERE c.recruteur_email = :rec');
            $this->db->bind(':rec', $email);
        
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function getMyCandidatures($email){
            $this->db->query('SELECT candidature.etat,candidature.date, jobs.title FROM candidature INNER JOIN jobs ON jobs.job_id = candidature.job_id WHERE candidature.user_email = :user_email');
            $this->db->bind(':user_email', $email);
        
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function updateState($data){
            $this->db->query('UPDATE candidature SET etat = :etat WHERE user_email = :user_email');
            $this->db->bind(':etat', $data['etat']);
            $this->db->bind(':user_email', $data['email']);
        
            if($this->db->execute()){
                return true;
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