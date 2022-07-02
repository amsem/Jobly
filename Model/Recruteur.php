<?php
    require_once "../Libraries/Database.php";
    
    class Recruteur{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function checkIfUserExists($email){
            $this->db->query('SELECT * FROM recruteur WHERE email = :email');
            $this->db->bind(':email',$email);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function register($data){
            $this->db->query('INSERT INTO recruteur (nom, prenom, entreprise, email, tel, password, valider,date_de_naissance) VALUES (:nom, :prenom, :entreprise, :email, :tel, :password, :valider,:date)');
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':entreprise', $data['entreprise']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':tel', $data['tel']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':valider', 0);
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

    }

?>