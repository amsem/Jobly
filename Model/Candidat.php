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
            $this->db->query('INSERT INTO candidat (nom, prenom, email, password,date_de_naissance) VALUES (:name, :fname, :email, :password,:date)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':fname', $data['family_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':date', $data['date']);
            
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

        public function modifyInformations($email,$data){
            $this->db->query('UPDATE candidat SET nom = :name,prenom = :family_name,date_de_naissance = :date,cv = :cv WHERE email = :emailCond');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':family_name', $data['family_name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':cv', $data['cv']);
            $this->db->bind(':emailCond', $email);
        
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function newPass($email,$pass){
            $this->db->query('UPDATE candidat SET password = :pass WHERE email = :emailCond');
            $this->db->bind(':pass', $pass);
            $this->db->bind(':emailCond', $email);
        
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

?>