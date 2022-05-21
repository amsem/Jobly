<?php
    require_once "../Libraries/Database.php";
    
    class Candidat{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function checkIfUserExists($email){
            $this->db->query('SELECT * FROM candidat WHERE email = :email');
            $this->db->bind(':email',$email);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function register($data){
            $this->db->query('INSERT INTO candidat (name, family_name, email, password) VALUES (:name, :fname, :email, :password)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':fname', $data['family_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function login($email,$password){
            $row = $this->checkIfUserExists($email);
            if($row == false) return false;
            $hashedPass = $row->password;
            if(password_verify($password,$hashedPass)){
                return $row;
            }else{
                return false;
            }
        }

    }

?>