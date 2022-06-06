<?php
    require_once "c:/xampp/htdocs/dev.jobly.com/Libraries/Database.php";
    
    class Admin{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        public function login($username, $password){
            $this->db->query("SELECT * FROM administrateur WHERE user = :username");
            $this->db->bind(':username', $username);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                if(password_verify($password, $row->password)){
                    return $row;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function validateRec($id){
            $this->db->query('UPDATE recruteur SET valider = "1" WHERE id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteRec($id){
            $this->db->query('DELETE FROM recruteur WHERE id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteCan($id){
            $this->db->query('DELETE FROM candidat WHERE id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllRec(){
            $this->db->query('SELECT * FROM recruteur');
            $rows = $this->db->resultSet();
            return $rows;
        }

        public function getAllCan(){
            $this->db->query('SELECT * FROM candidat');
            $rows = $this->db->resultSet();
            return $rows;
        }

        public function deleteOffer($id){
            $this->db->query('DELETE FROM jobs WHERE job_id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllOffers(){
            $this->db->query('SELECT * FROM jobs');
            $rows = $this->db->resultSet();
            return $rows;
        }


    }

?>